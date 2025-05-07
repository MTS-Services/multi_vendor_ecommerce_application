<?php

namespace App\Http\Controllers\Backend\Admin\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperationSubAreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:operation-sub-area-list', ['only' => ['index']]);
        $this->middleware('permission:operation-sub-area-list', ['only' => ['details']]);
        $this->middleware('permission:operation-sub-area-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:operation-sub-area-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:operation-sub-area-delete', ['only' => ['destroy']]);
        $this->middleware('permission:operation-sub-area-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = City::with(['creater_admin', 'parent'])
            ->orderBy('sort_order', 'asc')
            ->latest();
            return DataTables::eloquent($query)
                ->editColumn('parent_id', function ($city) {
                    return $city->country_name  . ($city->state_name ? "(". $city->state_name .")": "");
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
        $data['countries'] = Country::active()->select('id','name','slug')->orderBy('name')->get();
        return view('backend.admin.setup.city.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = admin()->id;
        $validated['parent_id'] = $request->state ? $request->state : $request->country;
        $validated['parent_type'] = $request->state ? State::class : Country::class;
        City::create($validated);
        session()->flash('success','City created successfully!');
        return redirect()->route('setup.city.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = City::with(['creater_admin', 'updater_admin', 'parent'])->findOrFail(decrypt($id));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['city'] = City::with('parent')->findOrFail(decrypt($id));
        $data['countries'] = Country::active()->select('id','name','slug')->orderBy('name')->get();
        return view('backend.admin.setup.city.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, string $id): RedirectResponse
    {
        $city = City::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['created_by'] = admin()->id;
        $validated['parent_id'] = $request->state ? $request->state : $request->country;
        $validated['parent_type'] = $request->state ? State::class : Country::class;
        $city->update($validated);
        session()->flash('success','City updated successfully!');
        return redirect()->route('setup.city.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        $city = City::findOrFail(decrypt($id));
        $city->update(['deleted_by'=> admin()->id]);
        $city->delete();
        session()->flash('success', 'City deleted successfully!');
        return redirect()->route('setup.city.index');
    }

    public function status(string $id): RedirectResponse
    {
        $city = City::findOrFail(decrypt($id));
        $city->update(['status' => !$city->status, 'updated_by'=> admin()->id]);
        session()->flash('success', 'City status updated successfully!');
        return redirect()->route('setup.city.index');
    }
}
