<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductManagement\ProductTagRequest;
use App\Models\ProductTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductTagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:product-tag-list', ['only' => ['index']]);
        $this->middleware('permission:product-tag-details', ['only' => ['show']]);
        $this->middleware('permission:product-tag-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-tag-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-tag-delete', ['only' => ['destroy']]);
        $this->middleware('permission:product-tag-status', ['only' => ['status']]);
        $this->middleware('permission:product-tag-recycle-bin', ['only' => ['recycleBin']]);
        $this->middleware('permission:product-tag-restore', ['only' => ['restore']]);
        $this->middleware('permission:product-tag-permanent-delete', ['only' => ['permanentDelete']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ProductTag::with(['creater'])
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('status', function ($product_tag) {
                    return "<span class='badge " . $product_tag->status_color . "'>$product_tag->status_label</span>";
                })
                ->editColumn('creater_by', function ($product_tag) {
                    return $product_tag->creater_name;
                })
                ->editColumn('created_at', function ($product_tag) {
                    return $product_tag->created_at_formatted;
                })
                ->editColumn('action', function ($product_tag) {
                    $menuItems = $this->menuItems($product_tag);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'created_by', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.product_management.product_tag.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['product-tags-list']
            ],
            [
                'routeName' => 'pm.product-tags.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['product-tags-edit']
            ],
            [
                'routeName' => 'pm.product-tags.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['product-tags-status']
            ],
            [
                'routeName' => 'pm.product-tags.slug',
                'params' => [encrypt($model->id)],
                'label' => $model->sulg_btn_label,
                'permissions' => ['product-tags-slug']
            ],
            [
                'routeName' => 'pm.product-tags.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['product-tags-delete']
            ]

        ];
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.product_management.product_tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductTagRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = admin()->id;
        ProductTag::create($validated);
        session()->flash('success', 'Product Tag created successfully!');
        return redirect()->route('pm.product-tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productTag = ProductTag::with(['creater', 'updater'])->findOrFail(decrypt($id));
        return response()->json($productTag);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productTag = ProductTag::findOrFail(decrypt($id));
        return view('backend.admin.product_management.product_tag.edit', compact('productTag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductTagRequest $request, string $id)
    {
        $productTag = ProductTag::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['updated_by'] = admin()->id;

        $productTag->update($validated);
        session()->flash('success', 'Product tag created successfully!');
        return redirect()->route('pm.product-tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $productTag = ProductTag::findOrFail(decrypt($id));
        $productTag->update(['deleter_by' => admin()->id, 'deleter_at' => get_class(admin())]);
        $productTag->delete();
        session()->flash('success', 'Product Tag deleted successfully!');
        return redirect()->route('pm.product-tags.index');
    }
    public function status(string $id): RedirectResponse
    {
        $productTag = ProductTag::findOrFail(decrypt($id));
        $productTag->update(['status' => !$productTag->status, 'updated_by' => admin()->id]);
        session()->flash('success', 'Product Tag status updated successfully!');
        return redirect()->route('pm.product-tags.index');
    }
}
