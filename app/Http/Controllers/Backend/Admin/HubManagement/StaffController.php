<?php

namespace App\Http\Controllers\Backend\Admin\HubManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hub\StaffRequest;
use App\Http\Traits\FileManagementTrait;
use App\Models\Hub;
use App\Models\Staff;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class StaffController extends Controller
{
    use FileManagementTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
         $this->middleware('permission:staff-list', ['only' => ['index']]);
        $this->middleware('permission:staff-details', ['only' => ['show']]);
        $this->middleware('permission:staff-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:staff-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:staff-delete', ['only' => ['destroy']]);
        $this->middleware('permission:staff-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {

        if ($request->ajax()) {


            $query = Staff::with(['creater_admin'])
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)

                ->editColumn('hub_id', function ($staff) {
                    return $staff->hub?->name .($staff->state ? : "");
                })
                ->editColumn('first_name', function ($staff) {
                    return $staff->full_name . ($staff->username ? " (" . $staff->username . ")" : "");
                })
                
                ->editColumn('status', function ($staff) {
                    return "<span class='badge " . $staff->status_color . "'>$staff->status_label</span>";
                })
                ->editColumn('is_verify', function ($staff) {
                    return "<span class='badge " . $staff->verify_color . "'>" . $staff->verify_label . "</span>";
                })
                ->editColumn('created_by', function ($staff) {
                    return $staff->creater_name;
                })
                ->editColumn('created_at', function ($staff) {
                    return $staff->created_at_formatted;
                })
                ->editColumn('action', function ($staff) {
                    $menuItems = $this->menuItems($staff);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['hub_id', 'first_name', 'role_id', 'status', 'is_verify', 'created_by', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.hub_management.staff_hub.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['staff-details']
            ],
            [
                'routeName' => 'hm.staff.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['staff-status']
            ],
            [
                'routeName' => 'hm.staff.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['staff-edit']
            ],

            [
                'routeName' => 'hm.staff.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['staff-delete']
            ]

        ];
    }

 public function recycleBin(Request $request)
    {

        if ($request->ajax()) {


            $query = Staff::with(['deleter_admin'])
                ->onlyTrashed()
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('hub_id', function ($staff) {
                    return $staff->hub?->name .($staff->state ? : "");
                })
                ->editColumn('first_name', function ($staff) {
                    return $staff->full_name . ($staff->username ? " (" . $staff->username . ")" : "");
                })
                ->editColumn('status', function ($staff) {
                    return "<span class='badge " . $staff->status_color . "'>$staff->status_label</span>";
                })
                ->editColumn('is_verify', function ($staff) {
                    return "<span class='badge " . $staff->verify_color . "'>" . $staff->verify_label . "</span>";
                })
                ->editColumn('deleted_by', function ($staff) {
                    return $staff->deleter_name;
                })
                ->editColumn('deleted_at', function ($staff) {
                    return $staff->deleted_at_formatted;
                })
                ->editColumn('action', function ($staff) {
                    $menuItems = $this->trashedMenuItems($staff);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns([ 'hub_id','first_name', 'status', 'is_verify', 'deleted_by', 'deleted_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.hub_management.staff_hub.recycle-bin');
    }
    protected function trashedMenuItems($model): array
    {
        return [
            [
                'routeName' => 'hm.staff.restore',
                'params' => [encrypt($model->id)],
                'label' => 'Restore',
                'permissions' => ['staff-restore']
            ],
            [
                'routeName' => 'hm.staff.permanent-delete',
                'params' => [encrypt($model->id)],
                'label' => 'Permanent Delete',
                'p-delete' => true,
                'permissions' => ['staff-permanent-delete']
            ]

        ];
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['hubs'] = Hub::active()->select('id', 'name')->get();
      
        return view('backend.admin.hub_management.staff_hub.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffRequest $request)
    {
       
        $validated = $request->validated();
      
        $validated['created_type'] = get_class(admin());
    if (isset($request->image)) {
            $validated['image'] = $this->handleFilepondFileUpload(Staff::class, $request->image, admin(), 'staff/');
        }
        Staff::create($validated);
        
        session()->flash('success', 'Staff created successfully!');
        return redirect()->route('hm.staff.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Staff::with(['creater_admin', 'updater_admin',])->findOrFail(decrypt($id));
       
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['staff'] = Staff::findOrFail(decrypt($id));
        $data['hubs'] = Hub::active()->select('id', 'name')->get();

        return view('backend.admin.hub_management.staff_hub.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaffRequest $request, string $id)
    {
        $staff = Staff::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['hub_id'] = $request->hub;
        $validated['updated_by'] = admin()->id;
        if(isset($request->image)){
            $validated['image'] = $this->handleFilepondFileUpload($staff, $request->image, admin(), 'staff/');
        }
        $staff->update($validated);
        session()->flash('success', 'Staff created successfully!');
        return redirect()->route('hm.staff.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $staff = Staff::findOrFail(decrypt($id));
        $staff->update(['deleter_id' => admin()->id, 'deleter_type' => get_class(admin())]);
        $staff->delete();
        session()->flash('success', 'Staff deleted successfully!');
        return redirect()->route('hm.staff.index');
    }

    public function status(string $id): RedirectResponse
    {
        $seller = Staff::findOrFail(decrypt($id));
        $seller->update(['status' => !$seller->status, 'updater_id' => admin()->id, 'updater_type' => get_class(admin())]);
        session()->flash('success', 'Staff status updated successfully!');
        return redirect()->route('hm.staff.index');
    }

     public function restore(string $id): RedirectResponse
    {
        $staff = Staff::onlyTrashed()->findOrFail(decrypt($id));
        $staff->update(['updated_by' => admin()->id]);
        $staff->restore();
        session()->flash('success', 'Staff restored successfully!');
        return redirect()->route('hm.staff.recycle-bin');
    }

    /**
     * Remove the specified resource from storage permanently.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function permanentDelete(string $id): RedirectResponse
    {
        $staff = Staff::onlyTrashed()->findOrFail(decrypt($id));
        if($staff->image){
            $this->fileDelete($staff->image);
        }
        $staff->forceDelete();
        session()->flash('success', 'Staff permanently deleted successfully!');
        return redirect()->route('hm.staff.recycle-bin');
    }

    
}
