<?php

namespace App\Http\Controllers\Backend\Admin\CMSManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CMS\OfferBannerRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\OfferBanner;
use Illuminate\Http\RedirectResponse;
use App\Http\Traits\FileManagementTrait;

class OfferBannerController extends Controller
{
    use FileManagementTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:offer-banner-list|offer-banner-create|offer-banner-edit|offer-banner-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:offer-banner-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:offer-banner-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:offer-banner-delete', ['only' => ['destroy']]);
        $this->middleware('permission:offer-banner-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = OfferBanner::with(['creater_admin'])
            ->orderBy('sort_order', 'asc')
            ->latest();
            return DataTables::eloquent($query)

                ->editColumn('status', function ($offer_banner) {
                    return "<span class='badge " . $offer_banner->status_color . "'>$offer_banner->status_label</span>";
                })

                ->editColumn('created_by', function ($offer_banner) {
                    return $offer_banner->creater_name;
                })
                ->editColumn('created_at', function ($offer_banner) {
                    return $offer_banner->created_at_formatted;
                })
                ->editColumn('action', function ($offer_banner) {
                    $menuItems = $this->menuItems($offer_banner);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns([ 'status','created_by', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.cms_management.offer_banner.index');
    }
    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['offer-banner-details']
            ],
            [
                'routeName' => 'cms.offer-banner.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['offer-banner-status']
            ],

            [
                'routeName' => 'cms.offer-banner.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['offer-banner-edit']
            ],

            [
                'routeName' => 'cms.offer-banner.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['offer-banner-delete']
            ]

        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.cms_management.offer_banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferBannerRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = admin()->id;
        if(isset($request->image)) {
            $validated['image'] = $this->handleFilepondFileUpload(OfferBanner::class, $request->image, admin(), 'offer_banners/');
        }
        OfferBanner::create($validated);
        session()->flash('success','Offer banner created successfully!');
        return redirect()->route('cms.offer-banner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = OfferBanner::with(['creater_admin', 'updater_admin'])->findOrFail(decrypt($id));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['offer_banners'] = OfferBanner::findOrFail(decrypt($id));
        return view('backend.admin.cms_management.offer_banner.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferBannerRequest $request, string $id)
    {
        $offer_banner = OfferBanner::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['updated_by'] = admin()->id;
        if(isset($request->image)) {
            $validated['image'] = $this->handleFilepondFileUpload($offer_banner, $request->image, admin(), 'offer_banners/');
        }
        $offer_banner->update($validated);
        session()->flash('success','Offer banner updated successfully!');
        return redirect()->route('cms.offer-banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $offer_banner = OfferBanner::findOrFail(decrypt($id));
        $offer_banner->update(['deleted_by' => admin()->id]);
        $offer_banner->delete();
        session()->flash('success', 'Offer banner deleted successfully!');
        return redirect()->route('cms.offer-banner.index');
    }

    public function status(string $id): RedirectResponse
    {
        $offer_banner = OfferBanner::findOrFail(decrypt($id));
        $offer_banner->update(['status' => !$offer_banner->status, 'updated_by'=> admin()->id]);
        session()->flash('success', 'offer banner status updated successfully!');
        return redirect()->route('cms.offer-banner.index');
    }
}
