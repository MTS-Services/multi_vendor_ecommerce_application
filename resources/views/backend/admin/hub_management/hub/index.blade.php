@extends('backend.admin.layouts.master', ['page_slug' => 'hub'])
@section('title', 'Hub List')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Hub List') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'hm.hub.create',
                        'label' => 'Add New',
                        'permissions' => ['hub-create'],
                    ]" />
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-striped datatable">
                        <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{ __('Country') }}</th>
                                <th>{{ __('City') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Created By') }}</th>
                                <th>{{ __('Created Date') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Admin Details Modal  --}}
    <x-backend.admin.details-modal :datas="['modal_title' => 'Hub Details']" />
@endsection
@push('js')
    <script src="{{ asset('datatable/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            let table_columns = [
                ['country_id', true, true],
                ['city_id', true, true],
                ['name', true, true],
                ['status', true, true],
                ['created_by', true, true],
                ['created_at', false, false],
                ['action', false, false],
            ];
            const details = {
                table_columns: table_columns,
                main_class: '.datatable',
                displayLength: 10,
                main_route: "{{ route('hm.hub.index') }}",
                order_route: "{{ route('update.sort.order') }}",
                export_columns: [0, 1, 2, 3, 4, 5, 6, 7],
                model: 'Hub',
            };
            initializeDataTable(details);
        })
    </script>
@endpush
@push('js')
    {{-- Show details scripts --}}
    <script src="{{ asset('modal/details_modal.js') }}"></script>
     <script>

        $(document).on("click", ".view", function() {
            let id = $(this).data("id");
            let route = "{{ route('hm.hub.show', ['id']) }}";
            const detailsUrl = route.replace("id", id);
            const headers = [
                    {
                        label: "Country",
                        key: "country_name"
                    },
                    {
                        label: "State",
                        key: "state_name"
                    },
                    {
                        label: "City",
                        key: "city_name"
                    },
                    {
                        label:"Operation Area",
                        key: "operation_area_name"
                    },

                    {
                        label: "Name",
                        key: "name"
                    },
                    {
                        label: "Slug",
                        key: "slug"
                    },
                    {
                        label:"Address",
                        key: "address",
                    },
                    {
                        label: "Status",
                        key: "status_label",
                        color: "status_color",
                    },
                    {
                        label:"Description",
                        key: "description",
                    },
                    {
                        label: "Latitude",
                        key: "latitude"
                    },
                    {
                        label:"Longitude",
                        key: "longitude",
                    },
                    {
                        label:"Meta Title",
                        key: "meta_title",

                    },
                    {
                        label:"Meta Description",
                        key: "meta_description",
                    },



            ];
            fetchAndShowModal(detailsUrl, headers, "#modal_data", "myModal");
        });
    </script>
@endpush
