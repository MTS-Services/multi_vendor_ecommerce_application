<?php

namespace App\Http\Controllers\Backend\Admin\ProductManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductManagement\TaxRateRequest;
use App\Models\Country;
use App\Models\TaxClass;
use App\Models\TaxRate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TaxRateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:tax-rate-list', ['only' => ['index']]);
        $this->middleware('permission:tax-rate-details', ['only' => ['show']]);
        $this->middleware('permission:tax-rate-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tax-rate-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tax-rate-delete', ['only' => ['destroy']]);
        $this->middleware('permission:tax-rate-status', ['only' => ['status']]);
        $this->middleware('permission:tax-rate-priority', ['only' => ['priority']]);
        $this->middleware('permission:tax-rate-compound', ['only' => ['compound']]);
        $this->middleware('permission:tax-rate-details', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $query = TaxRate::with(['creater_admin', 'taxClass', 'country', 'state', 'city'])
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('status', function ($tax_rate) {
                    return "<span class='badge " . $tax_rate->status_color . "'>$tax_rate->status_label</span>";
                })
                ->editColumn('tax_class_id', function ($tax_rate) {
                    return $tax_rate->taxClass?->name;
                })
                ->editColumn('country_id', function ($tax_rate) {
                    return $tax_rate->country?->name . ($tax_rate->state ? "(" . $tax_rate->state?->name . ")" : "");
                })
                ->editColumn('city_id', function ($tax_rate) {
                    return  $tax_rate->city?->name;
                })
                ->editColumn('created_by', function ($tax_rate) {
                    return $tax_rate->creater_name;
                })
                ->editColumn('created_at', function ($tax_rate) {
                    return $tax_rate->created_at_formatted;
                })
                ->editColumn('action', function ($tax_rate) {
                    $menuItems = $this->menuItems($tax_rate);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'priority', 'compound', 'tax_class_id', 'country_id', 'city_id', 'created_by', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.product_management.tax_rate.index');
    }

    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['tax-rate-details']
            ],
            [
                'routeName' => 'pm.tax-rate.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['tax-rate-edit']
            ],
            [
                'routeName' => 'pm.tax-rate.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['tax-rate-status']
            ],
            [
                'routeName' => 'pm.tax-rate.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['tax-rate-delete']
            ],

        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $data['countries'] = Country::active()->select('id','name','slug')->orderBy('name')->get();
        $data['tax_classes'] = TaxClass::active()->select('id','name')->orderBy('name')->get();
        return view('backend.admin.product_management.tax_rate.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaxRateRequest $request)
    {

         $validated = $request->validated();
        $validated['tax_class_id'] = $request->tax_class;
        $validated['country_id'] = $request->country;
        $validated['state_id'] = $request->state;
        $validated['city_id'] = $request->city;
        $validated['created_by'] = admin()->id;
        TaxRate::create($validated);
        session()->flash('success','Tax rate created successfully!');
        return redirect()->route('pm.tax-rate.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = TaxRate::with([ 'creater_admin','taxClass',  'country','state', 'updater_admin', 'city'])->findOrFail(decrypt($id));

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data['countries'] = Country::active()->select('id','name','slug')->orderBy('name')->get();
        $data['tax_classes'] = TaxClass::active()->select('id','name')->orderBy('name')->get();
        $data['tax_rate'] = TaxRate::findOrFail(decrypt($id));
        return view('backend.admin.product_management.tax_rate.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaxRateRequest $request, string $id)
    {
         $tax_rate = TaxRate::findOrFail(decrypt($id));
        $validated = $request->validated();
        $validated['tax_class_id'] = $request->tax_class;
        $validated['country_id'] = $request->country;
        $validated['state_id'] = $request->state;
        $validated['city_id'] = $request->city;
        $validated['updated_by'] = admin()->id;
        $tax_rate->update($validated);
        session()->flash('success','Tax rate updated successfully!');
        return redirect()->route('pm.tax-rate.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tax_rate = TaxRate::findOrFail(decrypt($id));
        $tax_rate->update(['deleted_by' => admin()->id]);
        $tax_rate->delete();
        session()->flash('success','Tax rate deleted successfully!');
        return redirect()->route('pm.tax-rate.index');
    }
    public function status(string $id): RedirectResponse
    {
        $Tax_status = TaxRate::findOrFail(decrypt($id));
        $Tax_status->update(['status' => !$Tax_status->status, 'updated_by' => admin()->id]);
        session()->flash('success', 'Tax Rate status updated successfully!');
        return redirect()->route('pm.tax-rate.index');
    }
    public function priority(string $id): RedirectResponse
    {
        $tax_priority = TaxRate::findOrFail(decrypt($id));
        $tax_priority->update(['priority' => !$tax_priority->priority, 'updated_by' => admin()->id]);
        session()->flash('success', 'Tax Rate priority updated successfully!');
        return redirect()->route('pm.tax-rate.index');
    }
    public function compound(string $id): RedirectResponse
    {
        $tax_compound = TaxRate::findOrFail(decrypt($id));
        $tax_compound->update(['compound' => !$tax_compound->compound, 'updated_by' => admin()->id]);
        session()->flash('success', 'Tax Rate compound updated successfully!');
        return redirect()->route('pm.tax-rate.index');
    }
}
