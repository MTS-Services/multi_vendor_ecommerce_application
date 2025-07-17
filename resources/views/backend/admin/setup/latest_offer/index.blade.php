@extends('backend.admin.layouts.master', ['page_slug' => 'latest_offer'])
@section('title', 'Latest Offer List')
@section('content')


<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Latest Offer List') }}</h4>
                    <div class="buttons">
                         <x-backend.admin.button :datas="[
                             'routeName' => 'setup.latest-offer.recycle-bin',
                            'label' => 'Recycle Bin',
                            'className' => 'btn-danger',
                            'permissions' => ['latest-offer-restore'],
                        ]" />   
                        <x-backend.admin.button :datas="[
                            'routeName' => 'setup.latest-offer.create',
                            'label' => 'Add New',
                            'permissions' => ['latest-offer-create'],
                        ]" />
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-striped datatable">
                        <thead>
                            <tr>
                                 <th>{{ __('SL') }}</th>
                                <th>{{ __('Title') }}</th>
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
    <x-backend.admin.details-modal :datas="['modal_title' => 'Admin Details']" />
@endsection
@push('js')
    <script src="{{ asset('custom_litebox/litebox.js') }}"></script>
    {{-- Datatable Scripts --}}
    <script src="{{ asset('datatable/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            let table_columns = [
                //name and data, orderable, searchable 
             
                ['title', true, true],
                ['status', true, true],
                ['creater_id', true, true],
                ['created_at', false, false],
                ['action', false, false],
            ];
            initializeDataTable(
                table_columns,
                '.datatable',
                10,
                [0, 1,2,3,4,5,6],
                "{{ route('setup.latest-offer.index') }}",
                "{{ route('update.sort.order') }}",
                'LatestOffer'
            );
            initializeDataTable(details);
        })
    </script>
@endpush



    {{-- <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Latest Offer List') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'setup.latest-offer.create',
                        'label' => 'Add New',
                        'permissions' => ['latest_offer-create'],
                    ]" />
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-striped datatable">
                        <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{ __('Title') }}</th>
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
    </div> --}}
    {{-- Details Modal  --}}
    {{-- <x-backend.admin.details-modal :datas="['modal_title' => 'latest Offer Details']" />
@endsection
@push('js')
    <script src="{{ asset('datatable/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            let table_columns = [
                //name and data, orderable, searchable
                ['title', true, true],
                ['status', true, true],
                ['creater_id', true, true],
                ['created_at', false, false],
                ['action', false, false],
            ];
            const details = {
                table_columns: table_columns,
                main_class: '.datatable',
                displayLength: 10,
                main_route: "{{ route('setup.latest-offer.index') }}",
                order_route: "{{ route('update.sort.order') }}",
                export_columns: [0, 1, 2, 3, 4, 5],
                model: 'last_offer',
            };
            initializeDataTable(details);
        })
    </script>
@endpush --}}
@push('js')
    {{-- Show details scripts --}}
    <script src="{{ asset('modal/details_modal.js') }}"></script>
    <script>
        // Event listener for viewing details
        $(document).on("click", ".view", function() {
            let id = $(this).data("id");
            let route = "{{ route('setup.latest-offer.show', ['id']) }}";
            const detailsUrl = route.replace("id", id);
            const headers = [{
                    label: "Title",
                    key: "title",
                },
                {
                    label: "Image",
                    key: "modified_image",
                },
                {
                    label: "Url ",
                    key: "url",
                },
                {
                    label: "Description",
                    key: "description",
                },
                {
                    label: "Sort Order",
                    key: "sort_order",
                },
                {
                    label: "Status",
                    key: "status_label",
                    color: "status_color",
                }

            ];
            fetchAndShowModal(detailsUrl, headers, "#modal_data", "myModal");
        });
    </script>
@endpush

