<?php

namespace App\Http\Controllers\Backend\Seller\product_management;

use App\Models\Brand;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use App\Models\TaxClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Seller\ProductRequest;
use App\Http\Traits\DetailsCommonDataTrait;
use App\Http\Traits\FileManagementTrait;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    use FileManagementTrait, DetailsCommonDataTrait;
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Product::with(['creater', 'seller', 'brand', 'category', 'taxClass'])
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('seller_id', fn($product) => $product->seller?->first_name)
                ->editColumn('brand_id', fn($product) => $product->brand?->name)
                ->editColumn('category_id', fn($product) => $product->category?->name)
                ->editColumn('tax_class_id', fn($product) => $product->taxClass?->name)
                ->editColumn('status', fn($product) => "<span class='badge {$product->status_color}'>{$product->status_label}</span>")
                ->editColumn('is_featured', fn($product) => "<span class='badge {$product->featured_color}'>{$product->featured_label}</span>")
                ->editColumn('is_published', fn($product) => "<span class='badge {$product->published_color}'>{$product->published_label}</span>")
                ->editColumn('creater_id', fn($product) => $product->creater_name)
                ->editColumn('created_at', fn($product) => $product->created_at_formatted)
                ->editColumn('action', fn($product) => view('components.backend.seller.action-buttons', ['menuItems' => $this->menuItems($product)])->render())
                ->rawColumns(['status', 'is_featured', 'creater_id', 'created_at', 'action', 'is_published', 'seller_id', 'brand_id', 'category_id', 'tax_class_id'])
                ->make(true);
        }
        return view('backend.seller.product_management.product.index');
    }
    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
            ],
            [

                'routeName' => 'seller.pm.product.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
            ],
            [
                'routeName' => 'seller.pm.product.toggle',
                'params' => [encrypt($model->id), 'status'],
                'label' => $model->status_btn_label,
            ],
            [
                'routeName' => 'seller.pm.product.toggle',
                'params' => [encrypt($model->id), 'is_featured'],
                'label' => $model->featured_btn_label,
            ],
            [
                'routeName' => 'seller.pm.product.toggle',
                'params' => [encrypt($model->id), 'is_published'],
                'label' => $model->published_btn_label,
            ],
            [
                'routeName' => 'seller.pm.product.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
            ]

        ];
    }
    public function recycleBin(Request $request)
    {
        if ($request->ajax()) {
            $query = Product::with(['deleter', 'seller', 'brand', 'category', 'taxClass'])
                ->onlyTrashed()
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('seller_id', fn($product) => $product->seller?->name)
                ->editColumn('brand_id', fn($product) => $product->brand?->name)
                ->editColumn('category_id', fn($product) => $product->category?->name)
                ->editColumn('tax_class_id', fn($product) => $product->taxClass?->name)
                ->editColumn('status', fn($product) => "<span class='badge {$product->status_color}'>{$product->status_label}</span>")
                ->editColumn('is_featured', fn($product) => "<span class='badge {$product->featured_color}'>{$product->featured_label}</span>")
                ->editColumn('is_published', fn($product) => "<span class='badge {$product->published_color}'>{$product->published_label}</span>")
                ->editColumn('deleted_id', fn($product) => $product->deleter_name)
                ->editColumn('deleted_at', fn($product) => $product->deleted_at_formatted)
                ->editColumn('action', fn($product) => view('components.backend.seller.action-buttons', ['menuItems' => $this->trashedMenuItems($product)])->render())
                ->rawColumns(['status', 'is_featured', 'deleted_id', 'deleted_at', 'action', 'is_published', 'seller_id', 'brand_id', 'category_id', 'tax_class_id'])
                ->make(true);
        }
        return view('backend.seller.product_management.product.recycle-bin');
    }
    protected function trashedMenuItems($model): array
    {
        return [
            [
                'routeName' => 'seller.pm.product.restore',
                'params' => [encrypt($model->id)],
                'label' => 'Restore',
            ],
            [
                'routeName' => 'seller.pm.product.permanent-delete',
                'params' => [encrypt($model->id)],
                'label' => 'Permanent Delete',
                'p-delete' => true,
            ]

        ];
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['sellers'] = Seller::active()->select('id', 'first_name',)->orderBy('first_name')->get();
        $data['brands'] = Brand::active()->select('id', 'name')->orderBy('name')->get();
        $data['categories'] = Category::active()->select('id', 'name')->orderBy('name')->get();
        $data['tax_classes'] = TaxClass::active()->select('id', 'name')->orderBy('name')->get();

        return view('backend.seller.product_management.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $validated = $request->validated();
        $validated['seller_id'] = $request->seller_id;
        $validated['brand_id'] = $request->brand_id;
        $validated['category_id'] = $request->category_id;
        $validated['tax_class_id'] = $request->tax_class_id;
        $validated['creater_id'] = seller()->id;
        $validated['creater_type'] = get_class(seller());

        Product::create($validated);
        session()->flash('success', 'Product created successfully!');
        return redirect()->route('seller.pm.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::with(['creater', 'seller', 'brand', 'category', 'taxClass'])->findOrFail(decrypt($id));
        $data['seller_name'] = $data->seller?->first_name;
        $data['brand_name'] = $data->brand?->name;
        $data['category_name'] = $data->category?->name;
        $data['tax_class_name'] = $data->taxClass?->name;
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['product'] = Product::findOrFail(decrypt($id));
        $data['sellers'] = Seller::active()->select('id', 'first_name',)->orderBy('first_name')->get();
        $data['brands'] = Brand::active()->select('id', 'name')->orderBy('name')->get();
        $data['categories'] = Category::active()->select('id', 'name')->orderBy('name')->get();
        $data['tax_classes'] = TaxClass::active()->select('id', 'name')->orderBy('name')->get();
        return view('backend.seller.product_management.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::findOrFail(decrypt($id));

        $data = $request->validated();
        $data['seller_id'] = $request->seller_id;
        $data['brand_id'] = $request->brand_id;
        $data['category_id'] = $request->category_id;
        $data['tax_class_id'] = $request->tax_class_id;
        $data['updater_id']    = seller()->id;
        $data['updater_type']  = get_class(seller());

        $product->update($data);

        return redirect()->route('seller.pm.product.index')
            ->with('success', 'Product updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $seller = Product::findOrFail(decrypt($id));
        $seller->update(['deleter_id' => seller()->id, 'deleter_type' => get_class(seller())]);
        $seller->delete();
        session()->flash('success', 'Product deleted successfully!');
        return redirect()->route('seller.pm.product.index');
    }
    public function toggle(string $id, string $field): RedirectResponse
    {
        $product = Product::findOrFail(decrypt($id));

        // Allowed fields to toggle
        $toggleFields = ['status', 'is_featured', 'is_published'];

        if (!in_array($field, $toggleFields)) {
            abort(400, 'Invalid field');
        }

        $product->update([
            $field => !$product->$field,
            'updater_id' => seller()->id,
            'updater_type' => get_class(seller()),
        ]);

        session()->flash('success', "Product {$field} updated successfully!");
        return redirect()->route('seller.pm.product.index');
    }


    public function restore(string $id): RedirectResponse
    {
        $seller = Product::onlyTrashed()->findOrFail(decrypt($id));
        $seller->update(['updater_id' => seller()->id, 'updater_type' => get_class(seller())]);
        $seller->restore();
        session()->flash('success', 'Product restored successfully!');
        return redirect()->route('seller.pm.product.recycle-bin');
    }

    /**
     * Remove the specified resource from storage permanently.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function permanentDelete(string $id): RedirectResponse
    {
        $seller = product::onlyTrashed()->findOrFail(decrypt($id));
        $seller->forceDelete();
        session()->flash('success', 'Product permanently deleted successfully!');
        return redirect()->route('seller.pm.product.recycle-bin');
    }
}
