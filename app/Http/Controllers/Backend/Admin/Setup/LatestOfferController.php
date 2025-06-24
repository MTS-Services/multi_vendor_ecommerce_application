<?php

namespace App\Http\Controllers\Backend\Admin\Setup;

use App\Models\LatestOffer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\Setup\LatestOfferRequest;
use App\Http\Traits\FileManagementTrait;

class LatestOfferController extends Controller
{
    use FileManagementTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:latest_offer-list|latest_offer-create|latest_offer-edit|latest_offer-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:latest_offer-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:latest_offer-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:latest_offer-delete', ['only' => ['destroy']]);
        $this->middleware('permission:latest_offer-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = LatestOffer::with(['creater'])
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('status', function ($latestoffer) {
                    return "<span class='badge " . $latestoffer->status_color . "'>$latestoffer->status_label</span>";
                })
                ->editColumn('creater_id', function ($latestoffer) {
                    return $latestoffer->creater_name;
                })
                ->editColumn('created_at', function ($latestoffer) {
                    return $latestoffer->created_at_formatted;
                })
                ->editColumn('action', function ($latestoffer) {
                    $menuItems = $this->menuItems($latestoffer);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['title', 'url', 'description', 'status', 'creater_id', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.setup.latest_offer.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['latest_offer-list']
            ],
            [
                'routeName' => 'setup.latest-offer.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['latest_offer-edit']
            ],
            [
                'routeName' => 'setup.latest-offer.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['latest_offer-status']
            ],
            [
                'routeName' => 'setup.latest-offer.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['latest_offer-delete']
            ]

        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.admin.setup.latest_offer.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LatestOfferRequest $request)
    {
      
        $validated = $request->validated();
        $validated['created_by'] = admin()->id;
        if (isset($request->image)) {
            $validated['image'] = $this->handleFilepondFileUpload(LatestOffer::class, $request->image, admin(), 'lastest_offers/');
        }
        LatestOffer::create($validated);
        session()->flash('success', 'Latest Offer created successfully!');
        return redirect()->route('setup.latest-offer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = LatestOffer::with(['creater', 'updater'])->findOrFail(decrypt($id));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['latestoffer'] = LatestOffer::findOrFail(decrypt($id));
        return view('backend.admin.setup.latest_offer.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LatestOfferRequest $request, string $id)
    {
        $latestoffer =LatestOffer ::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['updater_id'] = admin()->id;
        $validated['updater_type'] = get_class(admin());
        if (isset($request->image)) {
            $validated['image'] = $this->handleFilepondFileUpload($latestoffer, $request->image, admin(), 'product_attribute/');
        }
        $latestoffer->update($validated);
        session()->flash('success', 'latest offer updated successfully!');
        return redirect()->route('setup.latest-offer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $latestoffer = LatestOffer::findOrFail(decrypt($id));
        $latestoffer->update(['deleter_id' => admin()->id, 'deleter_type' => get_class(admin())]);
        $latestoffer->delete();
        session()->flash('success', 'latest offer deleted successfully!');
        return redirect()->route('setup.latest-offer.index');
    }
    public function status(string $id): RedirectResponse
    {
        $latestoffer = LatestOffer::findOrFail(decrypt($id));
        $latestoffer->update(['status' => !$latestoffer->status, 'updated_by' => admin()->id]);
        session()->flash('success', 'latest offer status updated successfully!');
        return redirect()->route('setup.latest-offer.index');
    }
}
