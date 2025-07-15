<?php

namespace App\Http\Controllers\Backend\Admin\HubManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hub\StaffRequest;
use App\Models\Staff;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends Controller
{
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
        dd('lksdjflkjlk');
        $query = Staff::with(['creater'])
            ->orderBy('sort_order', 'asc')
            ->latest()->get();
        if ($request->ajax()) {
            $query = Staff::with(['creater'])
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('first_name', function ($staff) {
                    return $staff->first_name . ($staff->username ? " (" . $staff->username . ")" : "");
                })
                ->editColumn('status', function ($staff) {
                    return "<span class='badge " . $staff->status_color . "'>" . $staff->status_label . "</span>";
                })
                ->editColumn('is_verify', function ($staff) {
                    return "<span class='badge " . $staff->verify_color . "'>" . $staff->verify_label . "</span>";
                })
                ->editColumn('created_at', function ($staff) {
                    return $staff->created_at_formatted;
                })
                ->editColumn('creater_id', function ($user) {
                    return $user->creater_name;
                })
                ->editColumn('action', function ($staff) {
                    $menuItems = $this->menuItems($staff);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['first_name', 'status', 'is_verify', 'created_at', 'creater_id', 'action'])
                ->make(true);
        }
        return view('backend.admin.hub_management.staff_hub.index');
    }

   

    /**
     * Show the form for creating a new resource.
     */
    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['staff-list']
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


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.hub_management.staff_hub.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffRequest $request)
    {
        $validated = $request->validated();

        $validated['created_by'] = admin()->id;

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

        return view('backend.admin.hub_management.staff_hub.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaffRequest $request, string $id)
    {
        $staff = Staff::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['updated_by'] = admin()->id;
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
}
