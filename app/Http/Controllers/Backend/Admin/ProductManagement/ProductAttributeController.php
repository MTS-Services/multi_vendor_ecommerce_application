<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductManagement\ProductAttributeRequest;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:product-attribute-list|product-attribute-create|product-attribute-edit|product-attribute-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-attribute-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-attribute-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-attribute-delete', ['only' => ['destroy']]);
        $this->middleware('permission:product-attribute-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductAttributeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(ProductAttributeRequest $request, string $id)
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
