<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Traits\FileManagementTrait;

class CategoryController extends Controller
{
    use FileManagementTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:category-list', ['only' => ['index']]);
        $this->middleware('permission:category-details', ['only' => ['show']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        $this->middleware('permission:category-status', ['only' => ['status']]);
        $this->middleware('permission:category-feature', ['only' => ['feature']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse|View
    {
        if ($request->ajax()) {
            $query = Category::isCategory()->with(['creater', 'sub_categories'])->withCount(['sub_categories'])
            ->orderBy('sort_order', 'asc')
            ->latest();
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
                'permissions' => ['category-list']
            ],
            [
                'routeName' => 'pm.category.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['category-edit']
            ],
            [
                'routeName' => 'pm.category.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['category-status']
            ],
            [
                'routeName' => 'pm.category.feature',
                'params' => [encrypt($model->id)],
                'label' => $model->featured_btn_label,
                'permissions' => ['category-feature']
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
    public function create(): View
    {
       return view('backend.admin.product_management.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['creater_id'] = admin()->id;
        $validated['creater_type'] = get_class(admin());
        if(isset($request->image)) {
            $validated['image'] = $this->handleFilepondFileUpload(Category::class, $request->image, admin(), 'categories/');
        }
        Category::create($validated);
        session()->flash('success','Category created successfully!');
        return redirect()->route('pm.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $data = Category::with(['creater', 'updater', 'sub_categories'])->findOrFail(decrypt($id));
        return response()->json($data);
    }

    public function edit(string $id)
    {
        $data['category'] = Category::findOrFail(decrypt($id));
        return view('backend.admin.product_management.category.edit', $data);
    }

    public function update(CategoryRequest $req, string $id): RedirectResponse
    {
        $category = Category::findOrFail(decrypt($id));
        $validated = $req->validated();
        $validated['updater_id'] = admin()->id;
        $validated['updater_type'] = get_class(admin());
        if(isset($request->image)) {
            $validated['image'] = $this->handleFilepondFileUpload($category, $req->image, admin(), 'categories/');
        }
        $category->update($validated);
        session()->flash('success', 'Category updated successfully!');
        return redirect()->route('pm.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $category = Category::findOrFail(decrypt($id));
        $category->update(['deleter_id' => admin()->id, 'deleter_type' => get_class(admin())]);
        $category->delete();
        session()->flash('success', 'Category deleted successfully!');
        return redirect()->route('pm.category.index');
    }

    public function status(string $id): RedirectResponse
    {
        $category = Category::findOrFail(decrypt($id));
        $category->update(['status' => !$category->status, 'updated_by'=> admin()->id]);
        session()->flash('success', 'Category status updated successfully!');
        return redirect()->route('pm.category.index');
    }
    public function feature(string $id): RedirectResponse
    {
        $category = Category::findOrFail(decrypt($id));
        $category->update(['is_featured' => !$category->is_featured, 'updated_by'=> admin()->id]);
        session()->flash('success', 'Category feature status updated successfully!');
        return redirect()->route('pm.category.index');
    }
}
