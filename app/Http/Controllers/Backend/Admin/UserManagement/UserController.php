<?php

namespace App\Http\Controllers\Backend\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Traits\DetailsCommonDataTrait;
use App\Http\Traits\FileManagementTrait;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use FileManagementTrait, DetailsCommonDataTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:user-list|user-details|user-delete|user-status', ['only' => ['index']]);
        $this->middleware('permission:user-details', ['only' => ['show']]);
        $this->middleware('permission:user-profile', ['only' => ['profile']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware('permission:user-status', ['only' => ['status']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::with(['creater'])
            ->orderBy('sort_order', 'asc')
            ->latest();
        if ($request->ajax()) {
            return DataTables::eloquent($query)
                ->editColumn('status', function ($user) {
                    return "<span class='badge " . $user->status_color . "'>" . $user->status_label . "</span>";
                })
                ->editColumn('is_verify', function ($user) {
                    return "<span class='badge " . $user->verify_color . "'>" . $user->verify_label . "</span>";
                })
                ->editColumn('created_at', function ($user) {
                    return $user->created_at_formatted;
                })
                ->editColumn('created_by', function ($user) {
                    return $user->creater_name;
                })
                ->editColumn('action', function ($user) {
                    $menuItems = $this->menuItems($user);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'is_verify', 'created_at', 'created_by', 'action'])
                ->make(true);
        }
        return view('backend.admin.user_management.user.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['user-details']
            ],
            [
                'routeName' => 'um.user.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['user-status']
            ],
            [
                'routeName' => 'um.user.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['user-edit']
            ],

            [
                'routeName' => 'um.user.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['user-delete']
            ]

        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('backend.admin.user_management.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $req): RedirectResponse
    {

        $user = new User();

        if (isset($req->image)) {
            $this->handleFilepondFileUpload($user, $req->image, admin(), 'users/');
        }
        $user->name = $req->name;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->creater()->associate(admin());
        $user->save();
        session()->flash('success', 'User created successfully!');
        return redirect()->route('um.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $data = User::with(['creater', 'updater'])->findOrFail(decrypt($id));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $data['user'] = User::findOrFail(decrypt($id));
        return view('backend.admin.user_management.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $req, string $id): RedirectResponse
    {
        // HHi
        $user = User::findOrFail(decrypt($id));

        if (isset($req->image)) {
            $this->handleFilepondFileUpload($user, $req->image, admin(), 'users/');
        }
        $user->name = $req->name;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = $req->password ? $req->password : $user->password;
        $user->updater()->associate(admin());
        $user->update();
        session()->flash('success', 'User updated successfully!');
        return redirect()->route('um.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $user = User::findOrFail(decrypt($id));
        $user->deleter()->associate(admin());
        $user->save();
        $user->delete();
        session()->flash('success', 'User deleted successfully!');
        return redirect()->route('um.user.index');
    }

    public function status(string $id): RedirectResponse
    {
        $user = User::findOrFail(decrypt($id));
        $user->status = !$user->status;
        $user->updater()->associate(admin());
        $user->update();
        session()->flash('success', 'User status updated successfully!');
        return redirect()->route('um.user.index');
    }
}
