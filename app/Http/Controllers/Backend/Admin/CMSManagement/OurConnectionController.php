<?php

namespace App\Http\Controllers\Backend\Admin\CMSManagement;

use App\Http\Controllers\Controller;
use App\Models\OurConnection;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OurConnectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:our_connection-list|our_connection-create|our_connection-edit|our_connection-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:our_connection-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:our_connection-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:our_connection-delete', ['only' => ['destroy']]);
        $this->middleware('permission:our_connection-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        if ($request->ajax()) {
        $query = OurConnection::with(['creater_admin'])
        ->orderBy('sort_order', 'asc')
        ->latest();
        return DataTables::eloquent($query)

            ->editColumn('status', function ($our_connection) {
                return "<span class='badge " . $our_connection->status_color . "'>$our_connection->status_label</span>";
            })

            ->editColumn('created_by', function ($our_connection) {
                return $our_connection->creater_name;
            })
            ->editColumn('created_at', function ($our_connection) {
                return $our_connection->created_at_formatted;
            })
            ->editColumn('action', function ($our_connection) {
                $menuItems = $this->menuItems($our_connection);
                return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
            })
            ->rawColumns([ 'status','created_by', 'created_at', 'action'])
            ->make(true);
    }
        return view('backend.admin.cms_management.our_connection.index');
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
