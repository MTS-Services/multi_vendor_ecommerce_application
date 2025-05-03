<?php

namespace App\Http\Controllers\Backend\Admin\AdminManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Admin;
use App\Http\Traits\DetailsCommonDataTrait;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Traits\FileManagementTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    use FileManagementTrait, DetailsCommonDataTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:admin-list|admin-details|admin-delete|admin-status', ['only' => ['index']]);
        $this->middleware('permission:admin-details', ['only' => ['show']]);
        $this->middleware('permission:admin-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:admin-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:admin-delete', ['only' => ['destroy']]);
        $this->middleware('permission:admin-status', ['only' => ['status']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $admins = Admin::with(['creater_admin'])->get();
        if ($request->ajax()) {
            $admins = $admins->sortBy('sort_order');
            return DataTables::of($admins)
                ->editColumn('role_id', function ($admin) {
                    return $admin->role->name;
                })
                ->editColumn('status', function ($admin) {
                    return "<span class='" . $admin->getStatusBadgeBg() . "'>" . $admin->getStatusBadgeTitle() . "</span>";
                })
                ->editColumn('created_at', function ($admin) {
                    return timeFormat($admin->created_at);
                })
                ->editColumn('created_by', function ($admin) {
                    return creater_name($admin->creater_admin);
                })
                ->editColumn('action', function ($admin) {
                    $menuItems = [
                        [
                            'routeName' => 'javascript:void(0)',
                            'data-id' => encrypt($admin->id),
                            'className' => 'view',
                            'label' => 'Details',
                            'permissions' => ['admin-list', 'admin-delete', 'admin-status']
                        ],
                        [
                            'routeName' => 'am.admin.status',
                            'params' => [encrypt($admin->id)],
                            'label' => $admin->getStatusBtnTitle(),
                            'permissions' => ['admin-status']
                        ],
                        [
                            'routeName' => 'am.admin.edit',
                            'params' => [encrypt($admin->id)],
                            'label' => 'Edit',
                            'permissions' => ['admin-edit']
                        ],

                        [
                            'routeName' => 'am.admin.destroy',
                            'params' => [encrypt($admin->id)],
                            'label' => 'Delete',
                            'delete' => true,
                            'permissions' => ['admin-delete']
                        ]

                    ];
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['role_id', 'status', 'created_at', 'created_by', 'action'])
                ->make(true);
        }
        return view('backend.admin.admin_management.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data['roles'] = Role::latest()->get();
        return view('backend.admin.admin_management.admin.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $req): RedirectResponse
    {

        $admin = new Admin();

        if (isset($req->image)) {
            $this->handleFilepondFileUpload($admin, $req->image, admin(), 'admins/');
        }
        $admin->role_id = $req->role;
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->password = $req->password;
        $admin->created_by = admin()->id;
        $admin->save();
        $admin->assignRole($admin->role->name);
        session()->flash('success', 'Admin created successfully!');
        return redirect()->route('am.admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $data = Admin::with(['creater_admin', 'updater_admin'])->findOrFail(decrypt($id));
        $this->AdminAuditColumnsData($data);
        $this->statusColumnData($data);
        $data->image = auth_storage_url($data->image);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $data['admin'] = Admin::findOrFail(decrypt($id));
        $data['roles'] = Role::latest()->get();
        return view('backend.admin.admin_management.admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $req, string $id): RedirectResponse
    {
        $admin = Admin::findOrFail(decrypt($id));

        if (isset($req->image)) {
            $this->handleFilepondFileUpload($admin, $req->image, $admin->image);
        }
        $admin->role_id = $req->role;
        $admin->name = $req->name;
        $admin->email = $req->email;
        if ($req->password) {
            $admin->password = $req->password;
        }
        $admin->updated_by = admin()->id;
        $admin->update();
        $admin->syncRoles($admin->role->name);
        session()->flash('success', 'Admin updated successfully!');
        return redirect()->route('am.admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $admin = Admin::with('role')->findOrFail(decrypt($id));
        if ($admin->role_id == 1) {
            session()->flash('error', 'Super Admin can not be deleted!');
            return redirect()->route('am.admin.index');
        }
        $admin->deleted_by = admin()->id;
        $admin->delete();
        session()->flash('success', 'Admin deleted successfully!');
        return redirect()->route('am.admin.index');
    }

    public function status(string $id): RedirectResponse
    {
        $admin = Admin::findOrFail(decrypt($id));
        $admin->status = !$admin->status;
        $admin->updated_by = admin()->id;
        $admin->update();
        session()->flash('success', 'Admin status updated successfully!');
        return redirect()->route('am.admin.index');
    }
}
