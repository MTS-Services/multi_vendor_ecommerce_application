<?php

namespace App\Http\Controllers\Backend\Admin\HubManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hub\HubRequest;
use App\Http\Traits\DetailsCommonDataTrait;
use App\Http\Traits\FileManagementTrait;
use App\Models\Country;
use App\Models\Hub;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HubController extends Controller
{
    use FileManagementTrait, DetailsCommonDataTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:hub-list', ['only' => ['index']]);
        $this->middleware('permission:hub-details', ['only' => ['show']]);
        $this->middleware('permission:hub-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:hub-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:hub-delete', ['only' => ['destroy']]);
        $this->middleware('permission:hub-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        if ($request->ajax()) {
            $query = Hub::with(['creater_admin','city','country','state','operationArea'])
            ->orderBy('sort_order', 'asc')
                ->latest();
                return DataTables::eloquent($query)
                ->editColumn('country_id', function ($hub) {
                    return $hub->country?->name . ($hub->state ? "(". $hub->state?->name .")": "");
                })
                ->editColumn('city_id', function ($hub) {
                    return  $hub->city?->name;
                })

                ->editColumn('operation_area_id', function ($hub) {
                    return  $hub->operationArea?->name;
                })
                ->editColumn('status', function ($hub) {
                    return "<span class='badge " . $hub->status_color . "'>$hub->status_label</span>";
                })
                ->editColumn('created_by', function ($hub) {
                    return $hub->creater_name;
                })
                ->editColumn('created_at', function ($hub) {
                    return $hub->created_at_formatted;
                })
                ->editColumn('action', function ($hub) {
                    $menuItems = $this->menuItems($hub);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['country_id','city_id','operation_area_id','status', 'created_by', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.hub_management.hub.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['hub-list']
            ],
            [
                'routeName' => 'hm.hub.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['hub-edit']
            ],
            [
                'routeName' => 'hm.hub.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['hub-status']
            ],
            [
                'routeName' => 'hm.hub.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['hub-delete']
            ]

        ];
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['countries'] = Country::active()->select('id','name','slug')->orderBy('name')->get();
        return view('backend.admin.hub_management.hub.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HubRequest $request)
    {
        $validated = $request->validated();
        $validated['country_id'] = $request->country;
        $validated['state_id'] = $request->state;
        $validated['city_id'] = $request->city;
        $validated['operation_area_id'] = $request->operation_area;
        $validated['created_by'] = admin()->id;

        Hub::create($validated);
        session()->flash('success','hub created successfully!');
        return redirect()->route('hm.hub.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Hub::with(['creater_admin', 'updater_admin', 'city','country','state','operationArea'])->findOrFail(decrypt($id));
        $data['country_name'] = $data->country?->name;
        $data['state_name'] = $data->state?->name;
        $data['city_name'] = $data->city?->name;
        $data['operation_area_name'] = $data->operationArea?->name;
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['hub'] = Hub::findOrFail(decrypt($id));
        $data['countries'] = Country::active()->select('id','name','slug')->orderBy('name')->get();
        return view('backend.admin.hub_management.hub.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HubRequest $request, string $id)
    {
        $hub = Hub::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['country_id'] = $request->country;
        $validated['state_id'] = $request->state;
        $validated['city_id'] = $request->city;
        $validated['operation_area_id'] = $request->operation_area;
        $validated['updated_by'] = admin()->id;
        $hub->update($validated);
        session()->flash('success','hub created successfully!');
        return redirect()->route('hm.hub.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : RedirectResponse
    {
        $seller = Hub::findOrFail(decrypt($id));
        $seller->update(['deleter_id' => admin()->id, 'deleter_type'=> get_class(admin())]);
        $seller->delete();
        session()->flash('success', 'Hub deleted successfully!');
        return redirect()->route('hm.hub.index');
    }

    public function status(string $id): RedirectResponse
    {
        $seller = Hub::findOrFail(decrypt($id));
        $seller->update(['status' => !$seller->status, 'updater_id'=> admin()->id,'updater_type'=> get_class(admin())]);
        session()->flash('success', 'Hub status updated successfully!');
        return redirect()->route('hm.hub.index');
    }
}
