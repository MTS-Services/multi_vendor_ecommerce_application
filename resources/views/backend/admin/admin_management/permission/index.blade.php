@extends('backend.admin.layouts.master', ['page_slug' => 'permission'])
@section('title', 'Permission List')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">{{ __('Permission List') }}</h4>
                    <div class="action_button">
                         <x-backend.admin.button :datas="[
                            'routeName' => 'am.permission.recycle-bin',
                            'label' => 'Recycle Bin',
                            'className' => 'btn-danger',
                            'permissions' => ['permission-restore'],
                        ]" />
                        <x-backend.admin.button :datas="[
                            'routeName' => 'permissions.export',
                            'label' => 'Export Permissions CSV',
                            'permissions' => ['permission-create'],
                        ]" />
                        <x-backend.admin.button :datas="[
                            'routeName' => 'am.permission.create',
                            'label' => 'Add New',
                            'permissions' => ['permission-create'],
                        ]" />
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table table-striped datatable">
                            <thead class=" text-primary">
                                <tr>
                                    <th>{{ __('SL') }}</th>
                                    <th>{{ __('Prefix') }}</th>
                                    <th>{{ __('Permisson') }}</th>
                                    <th>{{ __('Creadted By') }}</th>
                                    <th>{{ __('Created Date') }}</th>
                                    <th class="text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{-- Admin Details Modal  --}}
    <x-backend.admin.details-modal :datas="['modal_title' => 'Permission Details']" />
@endsection
@push('js')
    {{-- Datatable Scripts --}}
    <script src="{{ asset('datatable/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            let table_columns = [
                //name and data, orderable, searchable
                ['prefix', true, true],
                ['name', true, true],
                ['created_by', true, true],
                ['created_at', false, false],
                ['action', false, false],
            ];
            const details = {
                table_columns: table_columns,
                main_route: "{{ route('am.permission.index') }}",
                order_route: "{{ route('update.sort.order') }}",
                export_columns: [0, 1, 2, 3, 4],
                model: 'Permission',
            };
            initializeDataTable(details);
        })
    </script>
@endpush
@push('js')
    {{-- Show details scripts --}}
    <script src="{{ asset('modal/details_modal.js') }}"></script>
    <script>
        // Event listener for viewing details
        $(document).on("click", ".view", function() {
            let id = $(this).data("id");
            let route = "{{ route('am.permission.show', ['id']) }}";
            const detailsUrl = route.replace("id", id);
            const headers = [{
                    label: "Prefix",
                    key: "prefix"
                },
                {
                    label: "Name",
                    key: "name"
                },
            ];
            fetchAndShowModal(detailsUrl, headers, "#modal_data", "myModal");
        });
    </script>
@endpush
