@extends('backend.admin.layouts.master', ['page_slug' => 'offer_banner'])
@section('title', 'Offer Banner List')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Offer Banner List') }}</h4>
                    <div>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'cms.offer-banner.recycle-bin',
                        'label' => 'Recycle Bin',
                        'className' => 'btn-danger',
                        'permissions' => ['offer-banner-restore'],
                    ]" />
                    <x-backend.admin.button :datas="[
                        'routeName' => 'cms.offer-banner.create',
                        'label' => 'Add New',
                        'permissions' => ['offer-banner-create'],
                    ]" />
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-striped datatable">
                        <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Sub Title') }}</th>
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
    <x-backend.admin.details-modal :datas="['modal_title' => 'Offer Banner Details']" />
@endsection
@push('js')
    {{-- Datatable Scripts --}}
    <script src="{{ asset('datatable/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            let table_columns = [

                ['title', true, true],
                ['subtitle', true, true],
                ['status', true, true],
                ['created_by', true, true],
                ['created_at', false, false],
                ['action', false, false],
            ];
            const details = {
                table_columns: table_columns,
                main_class: '.datatable',
                displayLength: 10,
                main_route: "{{ route('cms.offer-banner.index') }}",
                order_route: "{{ route('update.sort.order') }}",
                export_columns: [0, 1, 2, 3, 4, 5],
                model: 'OfferBanner',
            };
            initializeDataTable(details);
        })
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('custom_litebox/litebox.css') }}">
@endpush
@push('js')
    <script src="{{ asset('custom_litebox/litebox.js') }}"></script>
    {{-- Show details scripts --}}
    <script src="{{ asset('modal/details_modal.js') }}"></script>
     <script>

        $(document).on("click", ".view", function() {
            let id = $(this).data("id");
            let route = "{{ route('cms.offer-banner.show', ['id']) }}";
            const detailsUrl = route.replace("id", id);
            const headers = [{
                    label: "Title",
                    key: "title"
                },
                {
                    label: "Sub Title",
                    key: "subtitle"
                },
                {
                    label: "Image",
                    key: "modified_image",
                    type: "image"
                },
                {
                    label: "Start Date",
                    key: "start_date",

                },
                {
                    label: "End Date",
                    key: "end_date",

                },
                {
                    label: "Status",
                    key: "status_label",
                    color: "status_color",
                },
            ];

            fetchAndShowModal(detailsUrl, headers, "#modal_data", "myModal");
        });
    </script>
@endpush

