<?php

namespace App\Http\Controllers\Backend\Admin\SellerManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\SellerRequest;
use App\Http\Traits\DetailsCommonDataTrait;
use App\Http\Traits\FileManagementTrait;
use Illuminate\Http\Request;
use App\Models\Seller;
use Yajra\DataTables\Facades\DataTables;

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
        $query = Seller::with(['creater_seller', 'role'])
        ->orderBy('sort_order', 'asc')
        ->latest();
    if ($request->ajax()) {
        return DataTables::eloquent($query)
            ->editColumn('role_id', function ($seller) {
                return optional($seller->role)->name;
            })
            ->editColumn('status', function ($seller) {
                return "<span class='badge " . $seller->status_color . "'>$seller->status_label</span>";
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
            ->rawColumns(['role_id', 'status', 'is_verify', 'created_by', 'created_at', 'action'])
            ->make(true);
    }
        return view('backend.admin.seller_management.index');
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
        return view('backend.admin.seller_management.create');
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
        $data['sellers']=Seller::all();
        return view('backend.admin.seller_management.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
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
