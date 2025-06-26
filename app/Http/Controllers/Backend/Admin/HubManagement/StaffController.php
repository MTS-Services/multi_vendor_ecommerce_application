<?php

namespace App\Http\Controllers\Backend\Admin\HubManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hub\StaffRequest;
use App\Http\Traits\FileManagementTrait;
use App\Models\Hub;
use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends Controller
{
    use FileManagementTrait;
     protected function redirectIndex(): RedirectResponse
    {
        return redirect()->route('hm.staff.index');
    }

    protected function redirectTrashed(): RedirectResponse
    {
        return redirect()->route('hm.staff.trash');
    }
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:staff-list', ['only' => ['index']]);
        $this->middleware('permission:staff-details', ['only' => ['show']]);
        $this->middleware('permission:staff-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:staff-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:staff-delete', ['only' => ['destroy']]);
        $this->middleware('permission:staff-status', ['only' => ['status']]);
        $this->middleware('permission:staff-recycle-bin', ['only' => ['recycleBin']]);
        $this->middleware('permission:staff-restore', ['only' => ['restore']]);
        $this->middleware('permission:staff-permanent-delete', ['only' => ['permanentDelete']]);
    }

    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {

        if ($request->ajax()) {
            $query = Staff::with(['creater', 'hub'])
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('first_name', function ($staff) {
                    return $staff->full_name . ($staff->username ? " (" . $staff->username . ")" : "");
                })
                ->editColumn('hub_id', function ($staff) {
                    return $staff->hub?->name;
                })
                ->editColumn('status', function ($staff) {
                    return "<span class='badge " . $staff->status_color . "'>" . $staff->status_label . "</span>";
                })
                ->editColumn('email_verified_at', function ($staff) {
                    return "<span class='badge " . $staff->verify_color . "'>" . $staff->verify_label . "</span>";
                })
                ->editColumn('created_at', function ($staff) {
                    return $staff->created_at_formatted;
                })
                ->editColumn('creater_id', function ($staff) {
                    return $staff->creater_name;
                })
                ->editColumn('action', function ($staff) {
                    $menuItems = $this->menuItems($staff);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['first_name','hub_id', 'status', 'email_verified_at', 'created_at', 'creater_id', 'action'])
                ->make(true);
        }
        return view('backend.admin.hub_management.staff.index');
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
                'routeName' => 'hm.staff.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['staff-edit']
            ],
            [
                'routeName' => 'hm.staff.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['staff-status']
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
            $query = Staff::with(['deleter', 'hub'])
                ->onlyTrashed()
                ->orderBy('sort_order', 'asc')
                ->latest();

            return DataTables::eloquent($query)
                ->editColumn('first_name', function ($staff) {
                    return $staff->full_name . ($staff->username ? " (" . $staff->username . ")" : "");
                })
                ->editColumn('hub_id', function ($staff) {
                    return $staff->hub?->name;
                })
                ->editColumn('status', function ($staff) {
                    return "<span class='badge " . $staff->status_color . "'>$staff->status_label</span>";
                })
           ->editColumn('email_verified_at', function ($staff) {
                    return "<span class='badge " . $staff->verify_color . "'>" . $staff->verify_label . "</span>";
                })
                ->editColumn('deleter_id', function ($staff) {
                    return $staff->deleter_name;
                })
                ->editColumn('deleted_at', function ($staff) {
                    return $staff->deleted_at_formatted;
                })
                ->editColumn('action', function ($staff) {
                    $menuItems = $this->trashedMenuItems($staff);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['first_name','hub_id', 'status', 'email_verified_at', 'deleter_id', 'deleted_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.hub_management.staff.recycle-bin');
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
        $data['hubs'] = Hub::select(['id', 'name'])->latest()->get();
      return view('backend.admin.hub_management.staff.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffRequest $request): RedirectResponse
    {

        DB::transaction(function () use ($request) {
            try{
                $validated= $request->validated();
                $validated['creater_id'] = admin()->id;
                $validated['creater_type'] = get_class(admin());

                if (isset($request->image)) {
                    $validated['image'] = $this->handleFilepondFileUpload(Staff::class, $request->image, admin(), 'staffs/');
                }
                Staff::create($validated);
                session()->flash('success', 'Staff created successfully!');
            } catch (\Throwable $e) {
                session()->flash('error', 'Staff create failed!');
                throw $e;
            }
        });
        return $this->redirectIndex();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $data = Staff::with(['creater', 'updater', 'hub'])->findOrFail(decrypt($id));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
      public function edit(string $id): View
    {
        $data['staff'] = Staff::findOrFail(decrypt($id));
        $data['hubs'] = Hub::select(['id', 'name'])->latest()->get();
        return view('backend.admin.hub_management.staff.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(StaffRequest $request, string $id): RedirectResponse
    {
        $staff = Staff::findOrFail(decrypt($id));
        DB::transaction(function () use ($request, $id, $staff) {
            try {
                $validated = $request->validated();
                $validated['password'] = ($request->password ? $request->password : $staff->password);
                if (isset($request->image)) {
                    $validated['image'] = $this->handleFilepondFileUpload($staff, $request->image, admin(), 'staffs/');
                }
                $validated['updater_id'] = admin()->id;
                $validated['updater_type'] = get_class(admin());
                $staff->update($validated);
                session()->flash('success', 'Staff updated successfully!');
            } catch (\Throwable $e) {
                session()->flash('error', 'Staff update failed!');
                throw $e;
            }
        });
        return $this->redirectIndex();
    }

    public function destroy(string $id): RedirectResponse
    {
        $staff = Staff::findOrFail(decrypt($id));
        $staff->update(['deleter_id' => admin()->id, 'deleter_type' => get_class(admin())]);
        $staff->delete();
        session()->flash('success', 'Staff move to recycle bin successfully!');
        return $this->redirectIndex();
    }

    public function status(string $id): RedirectResponse
    {
        $staff = Staff::findOrFail(decrypt($id));
        $staff->update(['status' => !$staff->status, 'updater_id' => admin()->id, 'updater_type' => get_class(admin())]);
        session()->flash('success', 'Admin status updated successfully!');
        return $this->redirectIndex();
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id): RedirectResponse
    {
        $staff = Staff::onlyTrashed()->findOrFail(decrypt($id));
        $staff->update(['updater_id' => admin()->id, 'updater_type' => get_class(admin())]);
        $staff->restore();
        session()->flash('success', 'Admin restored successfully!');
        return $this->redirectTrashed();
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
        if ($staff->image) {
            $this->fileDelete($staff->image);
        }
        $staff->forceDelete();
        session()->flash('success', 'Admin permanently deleted successfully!');
        return $this->redirectTrashed();
    }
}
