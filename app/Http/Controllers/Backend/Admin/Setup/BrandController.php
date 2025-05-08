<?php

namespace App\Http\Controllers\Backend\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setup\BrandRequest;
use App\Http\Traits\FileManagementTrait;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{

    use FileManagementTrait;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:brand-list', ['only' => ['index']]);
        $this->middleware('permission:brand-details', ['only' => ['show']]);
        $this->middleware('permission:brand-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:brand-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:brand-delete', ['only' => ['destroy']]);
        $this->middleware('permission:brand-status', ['only' => ['status']]);
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
                ->editColumn('created_by', function ($brand) {
                    return $brand->creater_name;
                })
                ->editColumn('created_at', function ($brand) {
                    return $brand->created_at_formatted;
                })
                ->editColumn('action', function ($brand) {
                    $menuItems = $this->menuItems($brand);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'is_featured', 'created_by', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.setup.brand.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['brand-details']
            ],
            [
                'routeName' => 'setup.brand.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['brand-edit']
            ],
            [
                'routeName' => 'setup.brand.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['brand-status']
            ],
            [
                'routeName' => 'setup.brand.feature',
                'params' => [encrypt($model->id)],
                'label' => $model->featured_btn_label,
                'permissions' => ['brand-feature']
            ],
            [
                'routeName' => 'setup.brand.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['brand-delete']
            ]

        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.setup.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $validated = $request->validated();
        $validated['creater_id'] = admin()->id;
        $validated['creater_type'] = get_class(admin());
        if (isset($request->logo)) {
            $validated['logo'] = $this->handleFilepondFileUpload(Brand::class, $request->logo, admin(), 'brands/');
        }
        Brand::create($validated);
        session()->flash('success', 'Brand created successfully!');
        return redirect()->route('setup.brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::with(['creater_admin', 'updater_admin'])->findOrFail(decrypt($id));
        return response()->json($brand);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail(decrypt($id));
        return view('backend.admin.setup.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        $brand = Brand::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['updater_id'] = admin()->id;
        $validated['updater_type'] = get_class(admin());
        if (isset($request->logo)) {
            $validated['logo'] = $this->handleFilepondFileUpload($brand, $request->logo, admin(), 'brands/');
        }
        $brand->update($validated);
        session()->flash('success', 'Brabd updated successfully!');
        return redirect()->route('setup.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail(decrypt($id));

        // Optional: Delete old logo file from storage
        if ($brand->logo && file_exists(public_path('uploads/brands/' . $brand->logo))) {
            unlink(public_path('uploads/brands/' . $brand->logo));
        }

        $brand->delete();

        return redirect()->route('setup.brand.index')->with('success', 'Brand deleted successfully!');
    }


    public function status(string $id): HttpFoundationRedirectResponse
    {
        $brand = Brand::findOrFail(decrypt($id));
        $brand->update(['status' => !$brand->status, 'updated_by' => admin()->id]);
        session()->flash('success', 'Brand status updated successfully!');
        return redirect()->route('setup.brand.index');
    }

    public function feature($id): HttpFoundationRedirectResponse
    {
        $brand = Brand::findOrFail(decrypt($id));
        $brand->update(['is_featured' => !$brand->featured, 'updated_by' => admin()->id]);
        session()->flash('success', 'Brand featured updated successfully!');
        return redirect()->route('setup.brand.index');
    }
}
