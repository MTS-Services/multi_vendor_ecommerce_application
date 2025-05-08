<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductManagement\ProductAttributeValueRequest;
use App\Models\ProductAttributeValue;

class ProductAttributeValueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:product-attribute-value-list|product-attribute-value-create|product-attribute-value-edit|product-attribute-value-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-attribute-value-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-attribute-value-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-attribute-value-delete', ['only' => ['destroy']]);
        $this->middleware('permission:product-attribute-value-status', ['only' => ['status']]);
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
    public function store(ProductAttributeValueRequest $request)
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
    public function update(ProductAttributeValueRequest $request, string $id)
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
