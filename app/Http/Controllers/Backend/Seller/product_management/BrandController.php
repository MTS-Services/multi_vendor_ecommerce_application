<?php

namespace App\Http\Controllers\Backend\Seller\product_management;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\Setup\BrandRequest;
use App\Models\Seller;
use App\Http\Traits\FileManagementTrait;
use Illuminate\Http\RedirectResponse;

class BrandController extends Controller
{

    use FileManagementTrait;
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
            $query = Brand::with(['creater'])
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)

                ->editColumn('status', function ($brand) {
                    return "<span class='badge " . $brand->status_color . "'>$brand->status_label</span>";
                })
                ->editColumn('is_featured', function ($brand) {
                    return "<span class='badge " . $brand->featured_color . "'>$brand->featured_label</span>";
                })
                
                ->editColumn('creater_id', function ($brand) {
                    return $brand->creater_name;
                })
                ->editColumn('created_at', function ($brand) {
                    return $brand->created_at_formatted;
                })
                ->editColumn('action', function ($brand) {
                    $menuItems = $this->menuItems($brand);
                    return view('components.backend.seller.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'is_featured', 'creater_id', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.seller.product_management.brand.index');
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

                'routeName' => 'seller.pm.brand.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
            ],
            [
                'routeName' => 'seller.pm.brand.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
            ],
            [
                'routeName' => 'seller.pm.brand.feature',
                'params' => [encrypt($model->id)],
                'label' => $model->featured_btn_label,
                'permissions' => ['brand-feature']
            ],
            [
                'routeName' => 'seller.pm.brand.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
            ]

        ];
    }



    public function recycleBin(Request $request)
    {

        if ($request->ajax()) {
            $query = Brand::with(['deleter'])
                ->onlyTrashed()
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('status', function ($brand): string {
                    return "<span class='badge " . $brand->status_color . "'>$brand->status_label</span>";
                })
                ->editColumn('is_featured', function ($brand) {
                    return "<span class='badge " . $brand->featured_color . "'>$brand->featured_label</span>";
                })
                ->editColumn('deleter_id', function ($brand) {
                    return $brand->deleter_name;
                })
                ->editColumn('deleted_at', function ($brand) {
                    return $brand->deleted_at_formatted;
                })
                ->editColumn('action', function ($brand) {
                    $menuItems = $this->trashedMenuItems($brand);
                    return view('components.backend.seller.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'is_featured', 'deleter_id', 'deleted_at', 'action'])
                ->make(true);
        }
        return view('backend.seller.product_management.brand.recycle-bin');
    }

    protected function trashedMenuItems($model): array
    {
        return [
            [
                'routeName' => 'seller.pm.brand.restore',
                'params' => [encrypt($model->id)],
                'label' => 'Restore',
            ],
            [
                'routeName' => 'seller.pm.brand.permanent-delete',
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
        return view('backend.seller.product_management.brand.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $validated = $request->validated();
        $validated['creater_id'] = seller()->id;
        $validated['creater_type'] = get_class(seller());
        if (isset($request->logo)) {
            $validated['logo'] = $this->handleFilepondFileUpload(Brand::class, $request->logo, seller(), 'brands/');
        }
        Brand::create($validated);
        session()->flash('success', 'Brand created successfully!');
        return redirect()->route('seller.pm.brand.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::with(['creater_seller', 'updater_seller'])->findOrFail(decrypt($id));
        return response()->json($brand);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail(decrypt($id));
        return view('backend.seller.product_management.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        $brand = Brand::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['updater_id'] = seller()->id;
        $validated['updater_type'] = get_class(seller());
        if (isset($request->logo)) {
            $validated['logo'] = $this->handleFilepondFileUpload($brand, $request->logo, seller(), 'brands/');
        }
        $brand->update($validated);
        session()->flash('success', 'Brand updated successfully!');
        return redirect()->route('seller.pm.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy(string $id)
    {

        $product_attribute = Brand::onlyTrashed()->findOrFail(decrypt($id));
        if ($product_attribute->logo) {
            $this->fileDelete($product_attribute->logo);
        }
        $product_attribute->forceDelete();
        session()->flash('success', 'Brand permanently deleted successfully!');
        return redirect()->route('seller.pm.brand.recycle-bin');
    }


    public function status(string $id): RedirectResponse
    {
        $brand = Brand::findOrFail(decrypt($id));
        $brand->update(['status' => !$brand->status, 'updated_by' => seller()->id]);
        session()->flash('success', 'Brand status updated successfully!');
        return redirect()->route('seller.pm.brand.index');
    }

    public function feature($id): RedirectResponse
    {
        $brand = Brand::findOrFail(decrypt($id));
        $brand->update(['is_featured' => !$brand->is_featured, 'updated_by' => seller()->id]);
        session()->flash('success', 'Brand featured updated successfully!');
        return redirect()->route('seller.pm.brand.index');
    }
    public function restore(string $id): RedirectResponse
    {
        $product_attribute = Brand::onlyTrashed()->findOrFail(decrypt($id));
        $product_attribute->update(['updated_by' => seller()->id]);
        $product_attribute->restore();
        session()->flash('success', 'Brand restored successfully!');
        return redirect()->route('seller.pm.brand.recycle-bin');
    }

    /**
     * Remove the specified resource from storage permanently.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function permanentDelete(string $id): RedirectResponse
    {
        $product_attribute = Brand::onlyTrashed()->findOrFail(decrypt($id));
        if ($product_attribute->logo) {
            $this->fileDelete($product_attribute->logo);
        }
        $product_attribute->forceDelete();
        session()->flash('success', 'Brand permanently deleted successfully!');
        return redirect()->route('seller.pm.brand.recycle-bin');
    }
}
