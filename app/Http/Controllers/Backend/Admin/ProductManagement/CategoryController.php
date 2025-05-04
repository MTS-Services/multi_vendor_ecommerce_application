<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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
    public function index()
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
        return view('backend.admin.product_management.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::active()->get(); // For parent selection
        return view('backend.admin.product_management.categories.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $stickerCategory = new StickerCategory();

        // // if ($request->hasFile('image')) {
        // //     $validated['image'] = $request->file('image')->store('sticker-categories', 'public');
        // // }

        // if ($request->hasFile('image')) {
        //     $this->handleFileUpload($request, $stickerCategory, 'image', 'image');
        // }

        // $validated = $request->validated();
        // $validated['image'] = $stickerCategory['image'];
        // $validated['created_by'] = admin()->id;
        // StickerCategory::create($validated);

        // return redirect()->route('am.sticker-category.index')
        //     ->with('success', 'Sticker category created successfully.');
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
