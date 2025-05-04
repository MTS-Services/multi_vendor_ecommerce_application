<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Traits\FileManagementTrait;

class CategoryController extends Controller
{
    use FileManagementTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        $this->middleware('permission:category-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::with(['creater', 'sub_categories'])
            ->orderBy('sort_order', 'asc')
            ->latest();
        if ($request->ajax()) {
            return DataTables::eloquent($query)
                ->editColumn('status', function ($category) {
                    return "<span class='badge " . $category->status_color . "'>$category->status_label</span>";
                })
                ->editColumn('is_featured', function ($category) {
                    return "<span class='badge " . $category->featured_color . "'>" . $category->featured_label . "</span>";
                })
                ->editColumn('creater_id', function ($category) {
                    return $category->creater_name;
                })
                ->editColumn('created_at', function ($category) {
                    return $category->created_at_formatted;
                })
                ->editColumn('action', function ($category) {
                    $menuItems = $this->menuItems($category);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'is_featured', 'creater_id', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.product_management.category.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['category-list', 'category-delete', 'category-status']
            ],
            [
                'routeName' => 'pm.category.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['category-status']
            ],
            [
                'routeName' => 'pm.category.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['category-edit']
            ],

            [
                'routeName' => 'pm.category.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['category-delete']
            ]

        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backend.admin.product_management.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['created_by'] = admin()->id;
        if(isset($request->image)) {
            $data['image'] = $this->handleFilepondFileUpload(Category::class, $request->image, admin(), 'categories/');
        }
<<<<<<< HEAD
        $categories->name = $req->name;
        $categories->description = $req->description;
        $categories->meta_title = $req->meta_title;
        $categories->meta_description = $req->meta_description;
        $categories->created_by = admin()->id;
        $categories->save();
        $categories->assignRole($categories->role->name);
        session()->flash('success', 'Category created successfully!');
        return redirect()->route('pm.admin.index');
=======
        Category::create($data);
        session()->flash('success','Category created successfully!');
        return redirect()->route('pm.category.index');
>>>>>>> f7d70aba48701837d33699111539660a7097d539
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
<<<<<<< HEAD
        $data = Category::with(['creater_admin', 'updater_admin', 'role'])->findOrFail(decrypt($id));
        $data->append(['modified_image', 'status_label', 'status_color', 'verify_label', 'verify_color', 'gender_label', 'gender_color', 'creater_name', 'updater_name']);
        return response()->json($data);
=======
        //
>>>>>>> f7d70aba48701837d33699111539660a7097d539
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
<<<<<<< HEAD
        $admin = Admin::findOrFail(decrypt($id));
=======
        //
    }
>>>>>>> f7d70aba48701837d33699111539660a7097d539

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
