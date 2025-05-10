<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use App\Http\Traits\FileManagementTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use Yajra\DataTables\Facades\DataTables;


class SubCategoryController extends Controller
{
    use FileManagementTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:subcategory-list', ['only' => ['index']]);
        $this->middleware('permission:subcategory-details', ['only' => ['show']]);
        $this->middleware('permission:subcategory-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:subcategory-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:subcategory-delete', ['only' => ['destroy']]);
        $this->middleware('permission:subcategory-status', ['only' => ['status']]);
        $this->middleware('permission:subcategory-feature', ['only' => ['feature']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse|View
    {

        if ($request->ajax()) {
            $query = Category::isSubCategory()->with(['creater', 'category'])
            ->orderBy('sort_order', 'asc')
            ->latest();
            return DataTables::eloquent($query)
                ->editColumn('parent_id', function ($subcategory) {
                    return $subcategory->category_name;
                })
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
                ->rawColumns(['parent_id','status', 'is_featured', 'creater_id', 'created_at', 'action'])
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
                'permissions' => ['subcategory-list']
            ],
            [
                'routeName' => 'pm.sub-category.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['subcategory-edit']
            ],
            [
                'routeName' => 'pm.sub-category.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['category-status']
            ],
            [
                'routeName' => 'pm.sub-category.feature',
                'params' => [encrypt($model->id)],
                'label' => $model->featured_btn_label,
                'permissions' => ['category-feature']
            ],
            [
                'routeName' => 'pm.sub-category.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['subcategory-delete']
            ]

        ];
    }

    public function create(): View
    {
        $data['categories'] = Category::isCategory()->active()->latest()->get();
        return view('backend.admin.product_management.sub_category.create',$data);
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryRequest $req): RedirectResponse
    {
        $validated = $req->validated();
        $validated['creater_id'] = admin()->id;
        $validated['creater_type'] = get_class(admin());
        if(isset($req->image)) {
            $validated['image'] = $this->handleFilepondFileUpload(Category::class, $req->image, admin(), 'subcategories/');
        }
        Category::create($validated);
        session()->flash('success','Sub Category created successfully!');
        return redirect()->route('pm.sub-category.index');
    }

    public function show(string $id)
    {
        $data = Category::with(['creater', 'updater', 'category'])->findOrFail(decrypt($id));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['product_attribute_value'] = ProductAttributeValue::findOrFail(decrypt($id));
    $data['product_attribute'] = ProductAttribute::all(); // <-- Add this line
    return view('backend.admin.product_management.product_attribute_value.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, string $id)
    {

        $subcategory = Category::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['updater_id'] = admin()->id;
        $validated['updater_type'] = get_class(admin());
        if(isset($req->image)) {
            $validated['image'] = $this->handleFilepondFileUpload($subcategory, $request->image, admin(), 'subcategories/');
        }
        $subcategory->update($validated);
        session()->flash('success', 'Sub category updated successfully!');
        return redirect()->route('pm.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = Category::findOrFail(decrypt($id));
        $subcategory->update(['updater_id' => admin()->id, 'updater_type'=> get_class(admin())]);
        $subcategory->delete();
        session()->flash('success', 'Sub category deleted successfully!');
        return redirect()->route('pm.sub-category.index');
    }
    public function status(string $id): RedirectResponse
    {
        $category = Category::findOrFail(decrypt($id));
        $category->update(['status' => !$category->status, 'updated_by'=> admin()->id]);
        session()->flash('success', 'Sub category status updated successfully!');
        return redirect()->route('pm.sub-category.index');
    }
    public function feature(string $id): RedirectResponse
    {
        $category = Category::findOrFail(decrypt($id));
        $category->update(['is_featured' => !$category->is_featured, 'updated_by'=> admin()->id]);
        session()->flash('success', 'Sub category feature status updated successfully!');
        return redirect()->route('pm.sub-category.index');
    }
}
