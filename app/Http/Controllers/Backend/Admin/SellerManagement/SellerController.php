<?php

namespace App\Http\Controllers\Backend\Admin\SellerManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\SellerRequest;
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
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
        $this->middleware('permission:product-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Seller::with(['creater'])
        ->orderBy('sort_order', 'asc')
        ->latest();
    if ($request->ajax()) {
        return DataTables::eloquent($query)

            ->editColumn('status', function ($seller) {
                return "<span class='badge " . $seller->status_color . "'>$seller->status_label</span>";
            })
            ->editColumn('gender', function ($seller) {
                return "<span class='badge " . $seller->gender_color . "'>$seller->gender_label</span>";
            })
            ->editColumn('is_verify', function ($seller) {
                return "<span class='badge " . $seller->verify_color . "'>" . $seller->verify_label . "</span>";
            })
            ->editColumn('created_by', function ($seller) {
                return $seller->creater_name;
            })
            ->editColumn('created_at', function ($seller) {
                return $seller->created_at_formatted;
            })
            ->editColumn('action', function ($seller) {
                $menuItems = $this->menuItems($seller);
                return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
            })
            ->rawColumns([ 'status','gender', 'is_verify', 'created_by', 'created_at', 'action'])
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
                'permissions' => ['seller-list', 'seller-delete', 'seller-status']
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
        $data= $request->validated();
        $data['created_by'] = admin()->id;
        if (isset($request->image)) {
            $data['image'] = $this->handleFilepondFileUpload(Seller::class, $request->image, seller(), 'sellers/');
        }
        $seller = Seller::create($data);
        session()->flash('success','Seller created successfully!');
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
        $data['seller'] = Seller::find(decrypt($id));
        return view('backend.admin.seller_management.seller.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $seller = Seller::find(decrypt($id));
        if (isset($request->image)) {
            $data['image'] = $this->handleFilepondFileUpload(Seller::class, $request->image, seller(), 'sellers/');
        }
        $seller->name = $request->name;
        $seller->username = $request->username;
        $seller->email = $request->email;
        $seller->password = $request->password;
        $seller->updater()->associate(seller());
        $seller->update();
        session()->flash('success', 'Seller updated successfully!');
        return redirect()->route('sl.seller.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $user = Seller::findOrFail(decrypt($id));
        $user->deleter()->associate(admin());
        $user->save();
        $user->delete();
        session()->flash('success', 'Seller deleted successfully!');
        return redirect()->route('sl.seller.index');
    }

    public function status(string $id): RedirectResponse
    {
        $seller = Seller::findOrFail(decrypt($id));
        $seller->status = !$seller->status;
        $seller->updater()->associate(admin());
        $seller->update();
        session()->flash('success', 'Seller status updated successfully!');
        return redirect()->route('sl.seller.index');
    }
}
