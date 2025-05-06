<?php

namespace App\Http\Controllers\Backend\Admin\CMSManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CMS\BannerRequest;
use App\Http\Traits\FileManagementTrait;
use App\Models\Banner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{

    use FileManagementTrait;

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
        $query = Banner::with(['creater'])
        ->orderBy('sort_order', 'asc')
        ->latest();
        return DataTables::eloquent($query)

            ->editColumn('status', function ($banner) {
                return "<span class='badge " . $banner->status_color . "'>$banner->status_label</span>";
            })

            ->editColumn('creater_id', function ($banner) {
                return $banner->creater_name;
            })
            ->editColumn('created_at', function ($banner) {
                return $banner->created_at_formatted;
            })
            ->editColumn('action', function ($banner) {
                $menuItems = $this->menuItems($banner);
                return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
            })
            ->rawColumns([ 'status','creater_id', 'created_at', 'action'])
            ->make(true);
    }
        return view('backend.admin.cms_management.banner.index');
    }
    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['banner-details']
            ],
            [
                'routeName' => 'cms.banner.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['banner-status']
            ],

            [
                'routeName' => 'cms.banner.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['banner-edit']
            ],

            [
                'routeName' => 'cms.banner.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['banner-delete']
            ]

        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.cms_management.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = admin()->id;
        if(isset($request->image)) {
            $validated['image'] = $this->handleFilepondFileUpload(Banner::class, $request->image, admin(), 'categories/');
        }
        Banner::create($validated);
        session()->flash('success','Banner created successfully!');
        return redirect()->route('cms.banner.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Banner::with(['creater', 'updater'])->findOrFail(decrypt($id));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['banners'] = Banner::findOrFail(decrypt($id));
        return view('backend.admin.cms_management.banner.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, string $id)
    {
        $validated = $request->validated();
        $validated['updated_by'] = admin()->id;
        if(isset($request->image)) {
            $validated['image'] = $this->handleFilepondFileUpload(Banner::class, $request->image, admin(), 'categories/');
        }
        Banner::findOrFail(decrypt($id))->update($validated);
        session()->flash('success','Banner updated successfully!');
        return redirect()->route('cms.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail(decrypt($id));
        $banner->update(['deleter_id' => admin()->id, 'deleter_type' => get_class(admin())]);
        $banner->delete();
        session()->flash('success', 'banner deleted successfully!');
        return redirect()->route('cms.banner.index');
    }
    public function status(string $id): RedirectResponse
    {
        $banner = Banner::findOrFail(decrypt($id));
        $banner->update(['status' => !$banner->status, 'updated_by'=> admin()->id]);
        session()->flash('success', 'banner status updated successfully!');
        return redirect()->route('cms.banner.index');
    }
}
