<?php

namespace App\Http\Controllers\Backend\Admin\AdminManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Traits\DetailsCommonDataTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class RoleController extends Controller
{
    use DetailsCommonDataTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:role-list|role-details|role-delete', ['only' => ['index']]);
        $this->middleware('permission:role-details', ['only' => ['show']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Role::with(['permissions:id,name,prefix', 'creater_admin'])
            ->orderBy('sort_order', 'asc')
            ->latest();
        if ($request->ajax()) {
            return DataTables::eloquent($query)
                ->editColumn('created_by', function ($role) {
                    return $role->creater_name;
                })
                ->editColumn('created_at', function ($role) {
                    return $role->created_at_formatted;
                })
                ->editColumn('action', function ($role) {
                    $menuItems = $this->menuItems($role);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['created_by', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.admin_management.role.index');
    }
    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['role-list', 'role-delete']
            ],
            [
                'routeName' => 'am.role.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['role-edit']
            ],

            [
                'routeName' => 'am.role.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['role-delete']
            ]
        ];
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $permissions = Permission::select(['id', 'name', 'prefix'])->orderBy('prefix')->get();
        $data['groupedPermissions'] = $permissions->groupBy(function ($permission) {
            return $permission->prefix;
        });
        return view('backend.admin.admin_management.role.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request): RedirectResponse
    {
        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = 'admin';
        $role->created_by = admin()->id;
        $role->save();

        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();
        $role->givePermissionTo($permissions);
        session()->flash('success', "$role->name role created successfully");
        return redirect()->route('am.role.index');
    }

    // /**
    //  * Display the specified resource.
    //  */
    public function show(string $id): JsonResponse
    {
        $data = Role::with(['permissions:id,name,prefix', 'creater_admin', 'updater_admin'])->findOrFail(decrypt($id));
        $data->permission_names = $data->permissions->pluck('name')->implode(' | ');
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = decrypt($id);
        if ($id == 1) {
            session()->flash('error', 'Super Admin can not be deleted!');
            return redirect()->route('am.role.index');
        }
        $data['role'] = Role::with('permissions:id,name,prefix')->findOrFail($id);
        $data['permissions'] = Permission::orderBy('prefix')->get();
        $data['groupedPermissions'] = $data['permissions']->groupBy(function ($permission) {
            return $permission->prefix;
        });
        return view('backend.admin.admin_management.role.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id): RedirectResponse
    {
        $role = Role::findOrFail(decrypt($id));
        $role->name = $request->name;
        $role->updated_by = admin()->id;
        $role->save();
        $permissions = Permission::whereIn('id', $request->permissions ?? [])->pluck('name')->toArray();
        $role->syncPermissions($permissions);
        session()->flash('success', "$role->name role updated successfully");
        return redirect()->route('am.role.index');
    }


    public function destroy(string $id): RedirectResponse
    {
        $id = decrypt($id);
        if ($id == 1) {
            session()->flash('error', 'Super Admin can not be deleted!');
            return redirect()->route('am.role.index');
        }
        $role = Role::findOrFail($id);
        $role->deleted_by = admin()->id;
        $role->delete();
        session()->flash('success', 'Role deleted successfully!');
        return redirect()->route('am.role.index');
    }
}
