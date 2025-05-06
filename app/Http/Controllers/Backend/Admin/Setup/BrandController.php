<?php

namespace App\Http\Controllers\Backend\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setup\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
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
            $query = Brand::with(['creater_admin'])
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('status', function ($brand) {
                    return "<span class='badge " . $brand->status_color . "'>$brand->status_label</span>";
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
                ->rawColumns(['status', 'created_by', 'created_at', 'action'])
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
        $validated= $request->validated();
        if(isset($request->logo)) {
            $validated['logo'] = $this->handleFilepondFileUpload(Brand::class, $request->logo, admin(), 'brands/');
        }
        $validated['created_by'] = admin()->id;
        Brand::create($validated);
        session()->flash('success','Brand created successfully!');
        return redirect()->route('setup.brand.index');
    }

    public function handleFilepondFileUpload($modelClass, $file, $user, $path)
{
    // যদি file pond ID দিয়ে আসছে তাহলে resolve করে ফাইল বের করো
    if (!($file instanceof UploadedFile)) {
        $filePath = Storage::disk('public')->path($file);
        $file = new UploadedFile($filePath, basename($filePath));
    }

    // ফাইল স্টোর করো
    $storedPath = $file->store($path, 'public');

    return $storedPath;
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Brand::with(['creater_admin', 'updater_admin'])->findOrFail(decrypt($id));
        return response()->json($data);
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
    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|unique:brands,slug,' . $id,
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            'status' => 'required|in:1,0',
        ]);

        if ($request->hasFile('logo')) {
            $fileName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads/brands'), $fileName);
            $brand->logo = $fileName;
        }

        $brand->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'website' => $request->website,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('setup.brand.index')->with('success', 'Brand updated successfully!');
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
        $country = Brand::findOrFail(decrypt($id));
        $country->update(['status' => !$country->status, 'updated_by' => admin()->id]);
        session()->flash('success', 'Brand status updated successfully!');
        return redirect()->route('setup.brand.index');
    }
}
