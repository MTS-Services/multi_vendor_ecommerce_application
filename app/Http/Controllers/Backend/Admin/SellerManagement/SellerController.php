<?php

namespace App\Http\Controllers\Backend\Admin\SellerManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SellerRequest;
use App\Http\Traits\DetailsCommonDataTrait;
use App\Http\Traits\FileManagementTrait;
use Illuminate\Http\Request;
use App\Models\Seller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\RedirectResponse;

class SellerController extends Controller
{
    use FileManagementTrait, DetailsCommonDataTrait;
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('permission:seller-list', ['only' => ['index']]);
        $this->middleware('permission:seller-details', ['only' => ['show']]);
        $this->middleware('permission:seller-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:seller-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:seller-delete', ['only' => ['destroy']]);
        $this->middleware('permission:seller-status', ['only' => ['status']]);
        $this->middleware('permission:seller-recycle-bin', ['only' => ['recycleBin']]);
        $this->middleware('permission:seller-restore', ['only' => ['restore']]);
        $this->middleware('permission:seller-permanent-delete', ['only' => ['permanentDelete']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $query = Seller::with(['creater'])
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)

                ->editColumn('first_name', function ($seller) {
                    return $seller->full_name . ($seller->username ? " (" . $seller->username . ")" : "");
                })
                ->editColumn('status', function ($seller) {
                    return "<span class='badge " . $seller->status_color . "'>$seller->status_label</span>";
                })
                ->editColumn('is_verify', function ($seller) {
                    return "<span class='badge " . $seller->verify_color . "'>" . $seller->verify_label . "</span>";
                })
                ->editColumn('creater_id', function ($seller) {
                    return $seller->creater_name;
                })
                ->editColumn('created_at', function ($seller) {
                    return $seller->created_at_formatted;
                })
                ->editColumn('action', function ($seller) {
                    $menuItems = $this->menuItems($seller);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'is_verify', 'creater_id', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.seller_management.seller.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['seller-details']
            ],
            [
                'routeName' => 'sl.seller.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['seller-status']
            ],

            [
                'routeName' => 'sl.seller.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['seller-edit']
            ],

            [
                'routeName' => 'sl.seller.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['seller-delete']
            ]

        ];
    }

    public function recycleBin(Request $request)
    {

        if ($request->ajax()) {
            $query = Seller::with(['deleter'])
                ->onlyTrashed()
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('first_name', function ($seller) {
                    return $seller->full_name . ($seller->username ? " (" . $seller->username . ")" : "");
                })
                ->editColumn('status', function ($seller) {
                    return "<span class='badge " . $seller->status_color . "'>$seller->status_label</span>";
                })
                ->editColumn('is_verify', function ($seller) {
                    return "<span class='badge " . $seller->verify_color . "'>" . $seller->verify_label . "</span>";
                })
                ->editColumn('deleted_by', function ($seller) {
                    return $seller->deleter_name;
                })
                ->editColumn('deleted_at', function ($seller) {
                    return $seller->deleted_at_formatted;
                })
                ->editColumn('action', function ($seller) {
                    $menuItems = $this->trashedMenuItems($seller);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'is_verify', 'deleted_by', 'deleted_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.seller_management.seller.recycle-bin');
    }

    protected function trashedMenuItems($model): array
    {
        return [
            [
                'routeName' => 'sl.seller.restore',
                'params' => [encrypt($model->id)],
                'label' => 'Restore',
                'permissions' => ['role-restore']
            ],
            [
                'routeName' => 'sl.seller.permanent-delete',
                'params' => [encrypt($model->id)],
                'label' => 'Permanent Delete',
                'p-delete' => true,
                'permissions' => ['role-permanent-delete']
            ]

        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.seller_management.seller.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SellerRequest $request)
    {
        $validated = $request->validated();
        $validated['creater_id'] = admin()->id;
        $validated['creater_type'] = get_class(admin());
        Seller::create($validated);
        session()->flash('success', 'Seller created successfully!');
        return redirect()->route('sl.seller.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Seller::with(['creater', 'updater'])->findOrFail(decrypt($id));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['seller'] = Seller::findOrFail(decrypt($id));
        return view('backend.admin.seller_management.seller.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SellerRequest $request, string $id)
    {
        $seller = Seller::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['password'] = ($request->password ? $request->password : $seller->password);
        $validated['updater_id'] = admin()->id;
        $validated['updater_type'] = get_class(admin());
        $validated['password'] = ($request->password ? $request->password : $seller->password);
        $seller->update($validated);
        session()->flash('success', 'Seller updated successfully!');
        return redirect()->route('sl.seller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $seller = Seller::findOrFail(decrypt($id));
        $seller->update(['deleter_id' => admin()->id, 'deleter_type' => get_class(admin())]);
        $seller->delete();
        session()->flash('success', 'Seller deleted successfully!');
        return redirect()->route('sl.seller.index');
    }

    public function status(string $id): RedirectResponse
    {
        $seller = Seller::findOrFail(decrypt($id));
        $seller->update(['status' => !$seller->status, 'updater_id' => admin()->id, 'updater_type' => get_class(admin())]);
        session()->flash('success', 'Seller status updated successfully!');
        return redirect()->route('sl.seller.index');
    }

       public function restore(string $id): RedirectResponse
    {
        $seller = Seller::onlyTrashed()->findOrFail(decrypt($id));
        $seller->update(['updated_by' => admin()->id]);
        $seller->restore();
        session()->flash('success', 'Seller restored successfully!');
        return redirect()->route('sl.seller.recycle-bin');
    }

    /**
     * Remove the specified resource from storage permanently.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function permanentDelete(string $id): RedirectResponse
    {
        $seller = Seller::onlyTrashed()->findOrFail(decrypt($id));
        $seller->forceDelete();
        session()->flash('success', 'Seller permanently deleted successfully!');
        return redirect()->route('sl.seller.recycle-bin');
    }
}
