<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
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
        $query = Category::with(['creater_admin', 'role'])
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
                ->editColumn('created_by', function ($category) {
                    return $category->creater_name;
                })
                ->editColumn('created_at', function ($category) {
                    return $category->created_at_formatted;
                })
                ->editColumn('action', function ($category) {
                    $menuItems = $this->menuItems($category);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'is_featured', 'created_by', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.product_management.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories['roles'] = Role::select(['id', 'name'])->latest()->get();
        return view('backend.admin.product_management.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $req): RedirectResponse
    {
        $categories = new Category();

        if (isset($req->image)) {
            $this->handleFilepondFileUpload($categories, $req->image, admin(), 'categories/');
        }
        $categories->name = $req->name;
        $categories->description = $req->description;
        $categories->meta_title = $req->meta_title;
        $categories->created_by = admin()->id;
        $categories->save();
        $categories->assignRole($categories->role->name);
        session()->flash('success', 'Category created successfully!');
        return redirect()->route('pm.admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $stickerCategory = StickerCategory::findOrFail(decrypt($id));
        // return view('backend.admin.stickerMangement.stickerCategory.show', compact('stickerCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $stickerCategory = StickerCategory::findOrFail(decrypt($id));
        // return view('backend.admin.stickerMangement.stickerCategory.edit', compact('stickerCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $validated = $request->validated();

        // $stickerCategory = StickerCategory::findOrFail(decrypt($id));


        // if ($request->hasFile('image')) {
        //     $this->handleFileUpload($request, $stickerCategory, 'image', 'image');
        // }

        // $validated['image'] = $stickerCategory['image'];
        // $validated['status'] = $request->has('status') ? 1 : 0;
        // $validated['updated_by'] = admin()->id;

        // // Update category
        // $stickerCategory->update($validated);

        // return redirect()->route('am.sticker-category.index')
        //     ->with('success', 'Sticker category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $stickerCategory = StickerCategory::findOrFail(decrypt($id));
        // if ($stickerCategory->image) {
        //     Storage::disk('public')->delete($stickerCategory->image);
        // }

        // $stickerCategory->delete();

        // return redirect()->route('am.sticker-category.index')->with('success', 'Category deleted successfully.');
    }
}
