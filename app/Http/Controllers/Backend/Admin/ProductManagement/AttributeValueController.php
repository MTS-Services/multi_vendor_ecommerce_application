<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductManagement\ProductAttributeValueRequest;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\RedirectResponse;

class AttributeValueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:product-attribute-value-list', ['only' => ['index']]);
        $this->middleware('permission:product-attribute-value-details', ['only' => ['show']]);
        $this->middleware('permission:product-attribute-value-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-attribute-value-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-attribute-value-delete', ['only' => ['destroy']]);
        $this->middleware('permission:product-attribute-value-status', ['only' => ['status']]);
        $this->middleware('permission:product-attribute-value-recycle-bin', ['only' => ['recycleBin']]);
        $this->middleware('permission:product-attribute-value-restore', ['only' => ['restore']]);
        $this->middleware('permission:product-attribute-value-permanent-delete', ['only' => ['permanentDelete']]);

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse|View
    {
        if ($request->ajax()) {
            $query = ProductAttributeValue::with(['creater'])
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('status', function ($product_attribute_value) {
                    return "<span class='badge " . $product_attribute_value->status_color . "'>$product_attribute_value->status_label</span>";
                })
                ->editColumn('product_attribute_id', function ($product_attribute_value) {
                    return $product_attribute_value->productAttribute?->name;
                })
                ->editColumn('creater_id', function ($product_attribute_value) {
                    return $product_attribute_value->creater_name;
                })
                ->editColumn('created_at', function ($product_attribute_value) {
                    return $product_attribute_value->created_at_formatted;
                })
                ->editColumn('action', function ($product_attribute_value) {
                    $menuItems = $this->menuItems($product_attribute_value);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['value', 'product_attribute_id', 'status', 'creater_id', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.product_management.product_attribute_value.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['product-attribute-value-list']
            ],
            [
                'routeName' => 'pm.product-attribute-value.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['product-attribute-value-edit']
            ],
            [
                'routeName' => 'pm.product-attribute-value.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['product-attribute-value-status']
            ],
            [
                'routeName' => 'pm.product-attribute-value.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['product-attribute-value-delete']
            ]

        ];
    }

         public function recycleBin(Request $request)
    {

        if ($request->ajax()) {
            $query = ProductAttributeValue::with(['deleter'])
                ->onlyTrashed()
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
           ->editColumn('status', function ($product_attribute_value) {
                    return "<span class='badge " . $product_attribute_value->status_color . "'>$product_attribute_value->status_label</span>";
                })
                ->editColumn('product_attribute_id', function ($product_attribute_value) {
                    return $product_attribute_value->productAttribute?->name;
                })
               ->editColumn('deleter_id', function ($product_attribute_value) {
                    return $product_attribute_value->deleter_name;
                })
                ->editColumn('deleted_at', function ($product_attribute_value) {
                    return $product_attribute_value->deleted_at_formatted;
                })
                ->editColumn('action', function ($product_attribute_value) {
                    $menuItems = $this->trashedMenuItems($product_attribute_value);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'product_attribute_id', 'deleter_id', 'deleted_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.product_management.product_attribute_value.recycle-bin');
    }

    protected function trashedMenuItems($model): array
    {
        return [
            [
                'routeName' => 'pm.product-attribute-value.restore',
                'params' => [encrypt($model->id)],
                'label' => 'Restore',
                'permissions' => ['product-attribute-value-restore']
            ],
            [
                'routeName' => 'pm.product-attribute-value.permanent-delete',
                'params' => [encrypt($model->id)],
                'label' => 'Permanent Delete',
                'p-delete' => true,
                'permissions' => ['product-attribute-value-permanent-delete']
            ]

        ];
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_attribute = ProductAttribute::active()->orderBy('name', 'asc')->get();
        return view('backend.admin.product_management.product_attribute_value.create', compact('product_attribute'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductAttributeValueRequest $request)
    {
        $validated = $request->validated();
        $validated['creater_id'] = admin()->id;
        $validated['creater_type'] = get_class(admin());
        if (isset($request->image)) {
            $validated['image'] = $this->handleFilepondFileUpload(ProductAttributeValue::class, $request->image, admin(), 'product_attribute_value/');
        }
        ProductAttributeValue::create($validated);
        session()->flash('success', 'Product Attribute Value created successfully!');
        return redirect()->route('pm.product-attribute-value.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ProductAttributeValue::with(['creater', 'updater'])->findOrFail(decrypt($id));
        $data['attribute_name'] = $data->productAttribute?->name;
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['product_attribute_value'] = ProductAttributeValue::findOrFail(decrypt($id));
        $data['product_attribute'] = ProductAttribute::active()->orderBy('name', 'asc')->get();
        return view('backend.admin.product_management.product_attribute_value.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductAttributeValueRequest $request, string $id)
    {
        $product_attribute_value = ProductAttributeValue::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['updater_id'] = admin()->id;
        $validated['updater_type'] = get_class(admin());
        $product_attribute_value->update($validated);
        session()->flash('success', 'Product attribute updated successfully!');
        return redirect()->route('pm.product-attribute-value.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product_attribute_value = ProductAttributeValue::findOrFail(decrypt($id));
        $product_attribute_value->update(['deleter_id' => admin()->id, 'deleter_type' => get_class(admin())]);
        $product_attribute_value->delete();
        session()->flash('success', 'Product attribute value deleted successfully!');
        return redirect()->route('pm.product-attribute-value.index');
    }
    public function status(string $id): RedirectResponse
    {
        $product_attribute_value = ProductAttributeValue::findOrFail(decrypt($id));
        $product_attribute_value->update(['status' => !$product_attribute_value->status, 'updated_by' => admin()->id]);
        session()->flash('success', 'Product attribute value status updated successfully!');
        return redirect()->route('pm.product-attribute-value.index');
    }

        public function restore(string $id): RedirectResponse
    {
        $product_attribute_value = ProductAttributeValue::onlyTrashed()->findOrFail(decrypt($id));
        $product_attribute_value->update(['updated_by' => admin()->id]);
        $product_attribute_value->restore();
        session()->flash('success', 'Product Attribute Value restored successfully!');
        return redirect()->route('pm.product-attribute-value.recycle-bin');
    }

    /**
     * Remove the specified resource from storage permanently.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function permanentDelete(string $id): RedirectResponse
    {
        $product_attribute_value = ProductAttributeValue::onlyTrashed()->findOrFail(decrypt($id));
        if($product_attribute_value->logo){
            $this->fileDelete($product_attribute_value->logo);
        }
        $product_attribute_value->forceDelete();
        session()->flash('success', 'Product Attribute Value permanently deleted successfully!');
        return redirect()->route('pm.product-attribute-value.recycle-bin');
    }
}
