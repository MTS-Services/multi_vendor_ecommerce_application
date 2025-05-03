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
        $query = Admin::with(['creater_admin', 'role'])
            ->orderBy('sort_order', 'asc')
            ->latest();
        if ($request->ajax()) {
            return DataTables::eloquent($query)
                ->editColumn('role_id', function ($admin) {
                    return optional($admin->role)->name;
                })
                ->editColumn('status', function ($admin) {
                    return "<span class='badge " . $admin->status_color . "'>$admin->status_label</span>";
                })
                ->editColumn('is_verify', function ($user) {
                    return "<span class='badge " . $user->verify_color . "'>" . $user->verify_label . "</span>";
                })
                ->editColumn('created_by', function ($admin) {
                    return $admin->creater_name;
                })
                ->editColumn('created_at', function ($admin) {
                    return $admin->created_at_formatted;
                })
                ->editColumn('action', function ($admin) {
                    $menuItems = $this->menuItems($admin);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['role_id', 'status', 'is_verify', 'created_by', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.admin_management.admin.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['admin-list', 'admin-delete', 'admin-status']
            ],
            [
                'routeName' => 'am.admin.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['admin-status']
            ],
            [
                'routeName' => 'am.admin.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['admin-edit']
            ],

            [
                'routeName' => 'am.admin.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['admin-delete']
            ]

        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data['roles'] = Role::select(['id', 'name'])->latest()->get();
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
        $data = Admin::with(['creater_admin', 'updater_admin', 'role'])->findOrFail(decrypt($id));
        $data->append(['modified_image', 'status_label', 'status_color', 'verify_label', 'verify_color', 'gender_label', 'gender_color', 'creater_name', 'updater_name']);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $data['admin'] = Admin::findOrFail(decrypt($id));
        $data['roles'] = Role::select(['id', 'name'])->latest()->get();
        return view('backend.admin.admin_management.admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $req, string $id): RedirectResponse
    {
        // HHi
        $admin = Admin::findOrFail(decrypt($id));

        if (isset($req->image)) {
            $this->handleFilepondFileUpload($admin, $req->image, admin(), 'admins/');
        }
        $admin->role_id = $req->role;
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->password = $req->password ? $req->password : $admin->password;
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
