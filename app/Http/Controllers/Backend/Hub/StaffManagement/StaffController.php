<?php

namespace App\Http\Controllers\Backend\Hub\StaffManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hub\StaffManagement\StaffRequest;
use App\Http\Traits\DetailsCommonDataTrait;
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
    use FileManagementTrait, DetailsCommonDataTrait;
    public function __construct()
    {
        $this->middleware('auth:staff');
        // $this->middleware('permission:staff-list', ['only' => ['index']]);
        // $this->middleware('permission:staff-details', ['only' => ['show']]);
        // $this->middleware('permission:staff-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:staff-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:staff-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:staff-status', ['only' => ['status']]);
        // $this->middleware('permission:staff-recycle-bin', ['only' => ['recycleBin']]);
        // $this->middleware('permission:staff-restore', ['only' => ['restore']]);
        // $this->middleware('permission:staff-permanent-delete', ['only' => ['permanentDelete']]);
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
                    return "<span class='badge " . $staff->status_color . "'>$staff->status_label</span>";
                })
                ->editColumn('email_verified_at', fn($staff) => "<span class='badge badge-soft {$staff->verify_color}'>{$staff->verify_label}</span>")
                ->editColumn('creater_id', function ($staff) {
                    return $staff->creater_name;
                })
                ->editColumn('created_at', function ($staff) {
                    return $staff->created_at_formatted;
                })
                ->editColumn('action', function ($staff) {
                    $menuItems = $this->menuItems($staff);
                    return view('components.backend.hub.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['hub_id', 'email_verified_at', 'first_name', 'status', 'creater_id', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.hub.staff_management.staff.index');
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
                'routeName' => 'sm.staff.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
            ],
            [
                'routeName' => 'sm.staff.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
            ],
            [
                'routeName' => 'sm.staff.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
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
                ->editColumn('email_verified_at', fn($staff) => "<span class='badge badge-soft {$staff->verify_color}'>{$staff->verify_label}</span>")
                ->editColumn('deleter_id', function ($staff) {
                    return $staff->deleter_name;
                })
                ->editColumn('deleted_at', function ($staff) {
                    return $staff->deleted_at_formatted;
                })
                ->editColumn('action', function ($staff) {
                    $menuItems = $this->trashedMenuItems($staff);
                    return view('components.backend.hub.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['first_name', 'email_verified_at', 'hub_id', 'status', 'deleter_id', 'deleted_at', 'action'])
                ->make(true);
        }
        return view('backend.hub.staff_management.staff.recycle-bin');
    }
    /**
     * Define menu items for trashed items in staff list.
     *
     * @param Staff $model
     * @return array
     */
    protected function trashedMenuItems($model): array
    {
        return [
            [
                'routeName' => 'sm.staff.restore',
                'params' => [encrypt($model->id)],
                'label' => 'Restore',
            ],
            [
                'routeName' => 'sm.staff.permanent-delete',
                'params' => [encrypt($model->id)],
                'label' => 'Permanent Delete',
                'p-delete' => true,
            ]

        ];
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data['hubs'] = Hub::select(['id', 'name'])->latest()->get();
        return view('backend.hub.staff_management.staff.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffRequest $request): RedirectResponse
    {

        DB::transaction(function () use ($request) {
            try {
                $validated = $request->validated();
                $validated['creater_id'] = staff()->id;
                $validated['creater_type'] = get_class(staff());

                if (isset($request->image)) {
                    $validated['image'] = $this->handleFilepondFileUpload(Staff::class, $request->image, staff(), 'staffs/');
                }
                Staff::create($validated);
                session()->flash('success', 'Staff created successfully!');
            } catch (\Throwable $e) {
                session()->flash('error', 'Staff create failed!');
                throw $e;
            }
        });
        return redirect()->route('sm.staff.index');
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
        return view('backend.hub.staff_management.staff.edit', $data);
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
                    $validated['image'] = $this->handleFilepondFileUpload($staff, $request->image, staff(), 'staffs/');
                }
                $validated['updater_id'] = staff()->id;
                $validated['updater_type'] = get_class(staff());
                $staff->update($validated);
                session()->flash('success', 'Staff updated successfully!');
            } catch (\Throwable $e) {
                session()->flash('error', 'Staff update failed!');
                throw $e;
            }
        });
        return redirect()->route('sm.staff.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $staff = Staff::findOrFail(decrypt($id));
        $staff->update(['deleter_id' => staff()->id, 'deleter_type' => get_class(staff())]);
        $staff->delete();
        session()->flash('success', 'Staff move to recycle bin successfully!');
        return redirect()->route('sm.staff.index');
    }

    public function status(string $id): RedirectResponse
    {
        $staff = Staff::findOrFail(decrypt($id));
        $staff->update(['status' => !$staff->status, 'updater_id' => staff()->id, 'updater_type' => get_class(staff())]);
        session()->flash('success', 'Admin status updated successfully!');
        return redirect()->route('sm.staff.index');
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
        $staff->update(['updater_id' => staff()->id, 'updater_type' => get_class(staff())]);
        $staff->restore();
        session()->flash('success', 'Admin restored successfully!');
        return redirect()->route('sm.staff.recycle-bin');
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
        return redirect()->route('sm.staff.recycle-bin');
    }
}
