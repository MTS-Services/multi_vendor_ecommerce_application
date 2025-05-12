<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductManagement\TaxClassRequest;
use App\Models\TaxClass;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TaxClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:tax-class-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:tax-class-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tax-class-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tax-class-delete', ['only' => ['destroy']]);
        $this->middleware('permission:tax-class-status', ['only' => ['status']]);
        $this->middleware('permission:tax-class-recycle-bin', ['only' => ['recycleBin']]);
        $this->middleware('permission:tax-class-restore', ['only' => ['restore']]);
        $this->middleware('permission:tax-class-permanent-delete', ['only' => ['permanentDelete']]);
    }

    /**
     * Display a listing of the resource.
     */

    public function index(Request $request): JsonResponse|View
    {

        if ($request->ajax()) {
            $query = TaxClass::with(['creater_admin'])
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('status', function ($tax_class) {
                    return "<span class='badge " . $tax_class->status_color . "'>$tax_class->status_label</span>";
                })
                ->editColumn('created_by', function ($tax_class) {
                    return $tax_class->creater_name;
                })
                ->editColumn('created_at', function ($tax_class) {
                    return $tax_class->created_at_formatted;
                })
                ->editColumn('action', function ($tax_class) {
                    $menuItems = $this->menuItems($tax_class);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'creater_id', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.product_management.tax_class.index');
    }
    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['tax-class-details']
            ],
            [
                'routeName' => 'pm.tax-class.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['tax-class-edit']
            ],
            [
                'routeName' => 'pm.tax-class.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['tax-class-status']
            ],
            [
                'routeName' => 'pm.tax-class.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['tax-class-delete']
            ]

        ];
    }
    public function recycleBin(Request $request)
    {

        if ($request->ajax()) {
            $query = TaxClass::with(['deleter_admin'])
                ->onlyTrashed()
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)


                ->editColumn('status', function ($tax_class) {
                    return "<span class='badge " . $tax_class->status_color . "'>$tax_class->status_label</span>";
                })
                ->editColumn('deleted_by', function ($tax_class) {
                    return $tax_class->deleter_name;
                })
                ->editColumn('deleted_at', function ($tax_class) {
                    return $tax_class->deleted_at_formatted;
                })
                ->editColumn('action', function ($tax_class) {
                    $menuItems = $this->trashedMenuItems($tax_class);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'deleted_by', 'deleted_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.product_management.tax_class.recycle-bin');
    }
    protected function trashedMenuItems($model): array
    {
        return [
            [
                'routeName' => 'pm.tax-class.restore',
                'params' => [encrypt($model->id)],
                'label' => 'Restore',
                'permissions' => ['tax-class-restore']
            ],
            [
                'routeName' => 'pm.tax-class.permanent-delete',
                'params' => [encrypt($model->id)],
                'label' => 'Permanent Delete',
                'p-delete' => true,
                'permissions' => ['tax-class-permanent-delete']
            ]

        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.product_management.tax_class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaxClassRequest $request)
    {
        $validated = $request->validated();
        $validated['creater_id'] = admin()->id;
        $validated['creater_type'] = get_class(admin());

        TaxClass::create($validated);
        session()->flash('success', 'Tax Class created successfully!');
        return redirect()->route('pm.tax-class.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tax_class = TaxClass::findOrFail(decrypt($id));
        return response()->json($tax_class);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tax_class = TaxClass::findOrFail(decrypt($id));
        return view('backend.admin.product_management.tax_class.edit', compact('tax_class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaxClassRequest $request, string $id)
    {
        $tax_class = TaxClass::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['updater_id'] = admin()->id;
        $validated['updater_type'] = get_class(admin());
        $tax_class->update($validated);
        session()->flash('success', 'Tax Class updated successfully!');
        return redirect()->route('pm.tax-class.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tax_class = TaxClass::findOrFail(decrypt($id));
        $tax_class->delete();
        session()->flash('success', 'Tax Class deleted successfully!');
        return redirect()->route('pm.tax-class.index');
    }
    public function status(string $id): RedirectResponse
    {
        $tax_class = TaxClass::findOrFail(decrypt($id));
        $tax_class->update(['status' => !$tax_class->status, 'updated_by' => admin()->id]);
        session()->flash('success', 'Tax Class status updated successfully!');
        return redirect()->route('pm.tax-class.index');
    }
    public function restore(string $id): RedirectResponse
    {
        $tax_class = TaxClass::onlyTrashed()->findOrFail(decrypt($id));
        $tax_class->update(['updated_by' => admin()->id]);
        $tax_class->restore();
        session()->flash('success', 'Tax Class restored successfully!');
        return redirect()->route('pm.tax-class.recycle-bin');
    }

    public function permanentDelete(string $id): RedirectResponse
    {
        $tax_class = TaxClass::onlyTrashed()->findOrFail(decrypt($id));
        $tax_class->forceDelete();
        session()->flash('success', 'Tax Class permanently deleted successfully!');
        return redirect()->route('pm.tax-class.recycle-bin');
    }
}
