<?php

namespace App\Http\Controllers\Backend\Admin\CMSManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CMS\OurConnectionRequest;
use App\Models\OurConnection;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\RedirectResponse;
use App\Http\Traits\FileManagementTrait;


class OurConnectionController extends Controller
{
    use FileManagementTrait;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:our-connection-list', ['only' => ['index']]);
        $this->middleware('permission:our-connection-details', ['only' => ['show']]);
        $this->middleware('permission:our-connection-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:our-connection-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:our-connection-delete', ['only' => ['destroy']]);
        $this->middleware('permission:our-connection-status', ['only' => ['status']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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
                ->rawColumns(['status', 'created_by', 'created_at', 'action'])
                ->make(true);
        }
        return view('backend.admin.cms_management.our_connection.index');
    }


    protected function menuItems($model): array
    {
        return [
            [
                'routeName' => 'javascript:void(0)',
                'data-id' => encrypt($model->id),
                'className' => 'view',
                'label' => 'Details',
                'permissions' => ['our-connection-details']
            ],
            [
                'routeName' => 'cms.our-connection.status',
                'params' => [encrypt($model->id)],
                'label' => $model->status_btn_label,
                'permissions' => ['our_connection-status']
            ],

            [
                'routeName' => 'cms.our-connection.edit',
                'params' => [encrypt($model->id)],
                'label' => 'Edit',
                'permissions' => ['our_connection-edit']
            ],

            [
                'routeName' => 'cms.our-connection.destroy',
                'params' => [encrypt($model->id)],
                'label' => 'Delete',
                'delete' => true,
                'permissions' => ['our_connection-delete']
            ]

        ];
    }



    public function recycleBin(Request $request)
    {

        if ($request->ajax()) {


            $query = OurConnection::with(['deleter_admin'])
                ->onlyTrashed()
                ->orderBy('sort_order', 'asc')
                ->latest();
            return DataTables::eloquent($query)
                ->editColumn('status', function ($our_connection) {
                    return "<span class='badge " . $our_connection->status_color . "'>$our_connection->status_label</span>";
                })

                ->editColumn('deleted_by', function ($our_connection) {
                    return $our_connection->deleter_name;
                })
                ->editColumn('deleted_at', function ($our_connection) {
                    return $our_connection->deleted_at_formatted;
                })
                ->editColumn('action', function ($our_connection) {
                    $menuItems = $this->trashedMenuItems($our_connection);
                    return view('components.backend.admin.action-buttons', compact('menuItems'))->render();
                })
                ->rawColumns(['status', 'deleted_by', 'deleted_at', 'action'])
                ->make(true);
        };
        return view('backend.admin.cms_management.our_connection.recycle-bin');
    }
    protected function trashedMenuItems($model): array
    {
        return [
            [
                'routeName' => 'cms.our-connection.restore',
                'params' => [encrypt($model->id)],
                'label' => 'Restore',
                'permissions' => ['our-connection-restore']
            ],
            [
                'routeName' => 'cms.our-connection.permanent-delete',
                'params' => [encrypt($model->id)],
                'label' => 'Permanent Delete',
                'p-delete' => true,
                'permissions' => ['our-connection-permanent-delete']
            ]

        ];
    }

    public function create()
    {
        return view('backend.admin.cms_management.our_connection.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OurConnectionRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['created_by'] = admin()->id;
        $validated['creater_type'] = get_class(admin());
        if (isset($request->image)) {
            $validated['image'] = $this->handleFilepondFileUpload(OurConnection::class, $request->image, admin(), 'our_connection/');
        }
        OurConnection::create($validated);
        session()->flash('success', 'Our Connection created successfully!');
        return redirect()->route('cms.our-connection.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = OurConnection::with(['creater_admin'])->findOrFail(decrypt($id));
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['our_connection'] = OurConnection::findOrFail(decrypt($id));
        return view('backend.admin.cms_management.our_connection.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OurConnectionRequest $request, string $id)
    {
        $validated = $request->validated();
        $validated['updated_by'] = admin()->id;
        $validated['updater_type'] = get_class(admin());
        $faq = OurConnection::findOrFail(decrypt($id));
        $faq->update($validated);
        session()->flash('success', 'Our Connection updated successfully!');
        return redirect()->route('cms.our-connection.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = OurConnection::findOrFail(decrypt($id));
        $banner->update(['deleted_by' => admin()->id]);
        $banner->delete();
        session()->flash('success', 'Our Connection deleted successfully!');
        return redirect()->route('cms.our-connection.index');
    }

    public function status(string $id): RedirectResponse
    {
        $our_connection = OurConnection::findOrFail(decrypt($id));
        $our_connection->update(['status' => !$our_connection->status, 'updated_at' => admin()->id]);
        session()->flash('success', 'our connection status updated successfully!');
        return redirect()->route('cms.our-connection.index');
    }

    public function restore(string $id): RedirectResponse
    {
        $our_connection = OurConnection::onlyTrashed()->findOrFail(decrypt($id));
        $our_connection->update(['updated_by' => admin()->id]);
        $our_connection->restore();
        session()->flash('success', 'our connection restored successfully!');
        return redirect()->route('cms.our-connection.recycle-bin');
    }

    public function permanentDelete(string $id): RedirectResponse
    {
        $our_connection = OurConnection::onlyTrashed()->findOrFail(decrypt($id));
        $this->fileDelete($our_connection->image);
        $our_connection->forceDelete();
        session()->flash('success', 'our connection permanently deleted successfully!');
        return redirect()->route('cms.our-connection.recycle-bin');
    }



}
