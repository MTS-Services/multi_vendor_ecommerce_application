<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:subcategory-list|subcategory-create|subcategory-edit|subcategory-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:subcategory-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:subcategory-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:subcategory-delete', ['only' => ['destroy']]);
        $this->middleware('permission:subcategory-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::with(['creater', 'category'])
            ->orderBy('sort_order', 'asc')
            ->latest();
        if ($request->ajax()) {
            return DataTables::eloquent($query)
                ->editColumn('status', function ($subcategory) {
                    return "<span class='badge " . $subcategory->status_color . "'>$subcategory->status_label</span>";
                })
                ->editColumn('is_featured', function ($subcategory) {
                    return "<span class='badge " . $subcategory->featured_color . "'>" . $subcategory->featured_label . "</span>";
                })
                ->editColumn('creater_id', function ($subcategory) {
                    return $subcategory->creater_name;
                })
                ->editColumn('created_at', function ($subcategory) {
                    return $subcategory->created_at_formatted;
                })
                ->editColumn('action', function ($subcategory) {
                    $menuItems = $this->menuItems($subcategory);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'is_featured', 'creater_id', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.product_management.sub_category.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['subcategory-list', 'subcategory-delete', 'subcategory-status']
            ],
            [
                'routeName' => 'pm.subcategory.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['category-status']
            ],
            [
                'routeName' => 'pm.subcategory.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['subcategory-edit']
            ],

            [
                'routeName' => 'pm.subcategory.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['subcategory-delete']
            ]

        ];
    }

    public function create()
    {
        return view('backend.admin.product_management.sub_category.create');
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryRequest $Request)
    {
        $data = $Request->validated();
        $data['created_by'] = admin()->id;
        if(isset($request->image)) {
            $data['image'] = $this->handleFilepondFileUpload(Category::class, $Request->image, admin(), 'subcategories/');
        }
        Category::create($data);
        session()->flash('success','Sub Category created successfully!');
        return redirect()->route('pm.subcategory.index');
    }

    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategory['subcategory'] = Category::findOrFail(decrypt($id));
        $subcategory['roles'] = Role::select(['id', 'name'])->latest()->get();
        return view('backend.admin.product_management.sub_category.edit', $subcategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, string $id)
    {

        $subcategory = Category::findOrFail(decrypt($id));
        if (isset($request->image)) {
            $this->handleFilepondFileUpload($subcategory, $request->uploadImage, admin(), 'subcategories/');
        }
        $subcategory->name = $request->name;
        $subcategory->slug = $request->slug;
        $subcategory->description = $request->description;
        $subcategory->meta_title = $request->meta_title;
        $subcategory->meta_description = $request->meta_description;
        session()->flash('success', 'Admin updated successfully!');
        return redirect()->route('pm.subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = Category::findOrFail(decrypt($id));
        $subcategory->delete();
        session()->flash('success', 'Sub Category deleted successfully!');
        return redirect()->route('pm.subcategory.index');
    }
}
