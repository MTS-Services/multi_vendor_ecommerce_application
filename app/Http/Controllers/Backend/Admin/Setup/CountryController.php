<?php

namespace App\Http\Controllers\Backend\Admin\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setup\CountryRequest;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:country-list|country-create|country-edit|country-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:country-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:country-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:country-delete', ['only' => ['destroy']]);
        $this->middleware('permission:country-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Country::with(['creater'])
        ->orderBy('sort_order', 'asc')
        ->latest();
    if ($request->ajax()) {
        return DataTables::eloquent($query)

            ->editColumn('status', function ($country) {
                return "<span class='badge " . $country->status_color . "'>$country->status_label</span>";
            })

            ->editColumn('created_by', function ($country) {
                return $country->creater_name;
            })
            ->editColumn('created_at', function ($country) {
                return $country->created_at_formatted;
            })
            ->editColumn('action', function ($country) {
                $menuItems = $this->menuItems($country);
                return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
            })
            ->rawColumns([ 'status', 'created_by', 'created_at', 'action'])
            ->make(true);
    }
        return view('backend.admin.setup.country.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['country-list', 'country-delete', 'country-status']
            ],
            [
                'routeName' => 'sc.country.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['country-status']
            ],
            [
                'routeName' => 'sc.country.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['country-edit']
            ],

            [
                'routeName' => 'sc.country.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['country-delete']
            ]

        ];
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.setup.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {
        $country= $request->validated();

        $country = Country::create($country);
        session()->flash('success','Country created successfully!');
        return redirect()->route('sc.country.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $data = Country::with(['creater', 'updater'])->findOrFail(decrypt($id));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['country'] = Country::find(decrypt($id));
        return view('backend.admin.setup.country.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, string $id)
    {
       $country= Country::find(decrypt($id));
        $country->name= $request->name;
        $country->slug= $request->slug;
        $country->description= $request->description;
        $country->save();
        session()->flash('success','Country updated successfully!');
        return redirect()->route('sc.country.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Country::findOrFail(decrypt($id));
        $user->deleter()->associate(admin());
        $user->save();
        $user->delete();
        session()->flash('success', 'Country deleted successfully!');
        return redirect()->route('sc.country.index');
    }

    public function status(string $id): RedirectResponse
    {
        $user = Country::findOrFail(decrypt($id));
        $user->status = !$user->status;
        $user->updater()->associate(admin());
        $user->update();
        session()->flash('success', 'Country status updated successfully!');
        return redirect()->route('sc.country.index');

}
}
