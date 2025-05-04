<?php

namespace App\Http\Controllers\Backend\Admin\SellerManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\SellerRequest;
use App\Http\Traits\DetailsCommonDataTrait;
use App\Http\Traits\FileManagementTrait;
use Illuminate\Http\Request;
use App\Models\Seller;

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
    public function index()
    {
        $data['sellers']=Seller::all();
        return view('backend.admin.seller_management.index',$data);
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
    public function store(Request $request)
    {
        $seller= new Seller();

        if (isset($request->image)) {
            $this->handleFilepondFileUpload($seller, $request->image, seller(), 'sellers/');
        }
        $seller->name = $request->name;
        $seller->userName = $request->userName;
        $seller->gender = $request->gender;
        $seller->email = $request->email;
        $seller->password = $request->password;


        $seller->save();
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
