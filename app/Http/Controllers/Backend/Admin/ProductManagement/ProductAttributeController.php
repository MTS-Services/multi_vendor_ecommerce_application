<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductManagement\ProductAttributeRequest;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Traits\FileManagementTrait;

class ProductAttributeController extends Controller
{
    use FileManagementTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:product-attribute-list|product-attribute-create|product-attribute-edit|product-attribute-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-attribute-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-attribute-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-attribute-delete', ['only' => ['destroy']]);
        $this->middleware('permission:product-attribute-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ProductAttribute::with(['creater'])
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('status', function ($product_attribute) {
                    return "<span class='badge " . $product_attribute->status_color . "'>$product_attribute->status_label</span>";
                })
                // ->editColumn('is_featured', function ($product_attribute) {
                //     return "<span class='badge " . $product_attribute->featured_color . "'>" . $product_attribute->featured_label . "</span>";
                // })
                ->editColumn('creater_id', function ($product_attribute) {
                    return $product_attribute->creater_name;
                })
                ->editColumn('created_at', function ($product_attribute) {
                    return $product_attribute->created_at_formatted;
                })
                ->editColumn('action', function ($product_attribute) {
                    $menuItems = $this->menuItems($product_attribute);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'creater_id', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.product_management.product_attribute.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['product-attribute-list']
            ],
            [
                'routeName' => 'pm.product-attribute.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['product-attribute-edit']
            ],
            [
                'routeName' => 'pm.product-attribute.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['product-attribute-status']
            ],
            // [
            //     'routeName' => 'pm.product-attribute.feature',
            //     'params' => [encrypt($model->id)],
            //     'label' => $model->featured_btn_label,
            //     'permissions' => ['product-attribute-feature']
            // ],
            [
                'routeName' => 'pm.product-attribute.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['product-attribute-delete']
            ]

        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.product_management.product_attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductAttributeRequest $request)
    {
        $validated = $request->validated();
        $validated['creater_id'] = admin()->id;
        $validated['creater_type'] = get_class(admin());
        if (isset($request->image)) {
            $validated['image'] = $this->handleFilepondFileUpload(ProductAttribute::class, $request->image, admin(), 'product_attribute/');
        }
        ProductAttribute::create($validated);
        session()->flash('success', 'Product Attribute created successfully!');
        return redirect()->route('pm.product-attribute.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ProductAttribute::with(['creater', 'updater'])->findOrFail(decrypt($id));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['product_attribute'] = ProductAttribute::findOrFail(decrypt($id));
        return view('backend.admin.product_management.product_attribute.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductAttributeRequest $request, string $id): RedirectResponse
    {
        $product_attribute = ProductAttribute::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['updater_id'] = admin()->id;
        $validated['updater_type'] = get_class(admin());
        if (isset($request->image)) {
            $validated['image'] = $this->handleFilepondFileUpload($product_attribute, $request->image, admin(), 'product_attribute/');
        }
        $product_attribute->update($validated);
        session()->flash('success', 'Product Attribute updated successfully!');
        return redirect()->route('pm.product-attribute.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $product_attribute = ProductAttribute::findOrFail(decrypt($id));
        $product_attribute->update(['deleter_id' => admin()->id, 'deleter_type' => get_class(admin())]);
        $product_attribute->delete();
        session()->flash('success', 'Product Attribute deleted successfully!');
        return redirect()->route('pm.product-attribute.index');
    }

    public function status(string $id): RedirectResponse
    {
        $product_attribute = ProductAttribute::findOrFail(decrypt($id));
        $product_attribute->update(['status' => !$product_attribute->status, 'updated_by' => admin()->id]);
        session()->flash('success', 'Product Attribute status updated successfully!');
        return redirect()->route('pm.product-attribute.index');
    }
}
