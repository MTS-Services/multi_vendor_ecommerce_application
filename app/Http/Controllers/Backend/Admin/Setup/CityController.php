<?php

namespace App\Http\Controllers\Backend\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:city-list', ['only' => ['index']]);
        $this->middleware('permission:city-list', ['only' => ['details']]);
        $this->middleware('permission:city-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:city-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:city-delete', ['only' => ['destroy']]);
        $this->middleware('permission:city-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = City::with(['creater'])
            ->orderBy('sort_order', 'asc')
            ->latest();
            return DataTables::eloquent($query)
            ->editColumn('parent_id', function ($city) {
                return isset($city->parent->country) ? optional(optional($city->parent)->country)->name." (".optional($city->parent)->name.")" : optional($city->parent)->name;
                })

                ->editColumn('status', function ($city) {
                    return "<span class='badge " . $city->status_color . "'>$city->status_label</span>";
                })
                ->editColumn('created_by', function ($city) {
                    return $city->creater_name;
                })
                ->editColumn('created_at', function ($city) {
                    return $city->created_at_formatted;
                })
                ->editColumn('action', function ($city) {
                    $menuItems = $this->menuItems($city);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns([ 'parent_id','status', 'created_by', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.setup.city.index');
    }
    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['city-list']
            ],
            [
                'routeName' => 'setup.city.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['city-edit']
            ],
            [
                'routeName' => 'setup.city.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['city-status']
            ],
            [
                'routeName' => 'setup.city.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['city-delete']
            ]

        ];
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = City::with(['creater', 'updater', 'city'])->findOrFail(decrypt($id));
        return response()->json($data);
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
    public function status(string $id): RedirectResponse
    {
        $state = City::findOrFail(decrypt($id));
        $state->update(['status' => !$state->status, 'updated_by'=> admin()->id]);
        session()->flash('success', ' city status updated successfully!');
        return redirect()->route('setup.city.index');
    }
}
