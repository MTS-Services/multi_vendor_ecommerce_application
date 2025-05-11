<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductManagement\ProductTagRequest;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductTagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
        $this->middleware('permission:product-status', ['only' => ['status']]);
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
                ->editColumn('slug', function ($product_tag) {
                    return "<span class='badge " . $product_tag->slug_color . "'>$product_tag->slug_label</span>";
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
                ->rawColumns(['Slug', 'creater_id', 'created_at', 'action'])
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
         ProductTag::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

         $validated = $request->validated();
        $validated['creater_by'] = admin()->id;
        ProductTag::create($validated);
        session()->flash('success', 'Product Product Tag created successfully!');
        return redirect()->route('pm.product-tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
