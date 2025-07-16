@extends('backend.admin.layouts.master', ['page_slug' => 'our_connection'])
@section('title', 'Our Connection List')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Our Connection List') }}</h4>
                    <div><x-backend.admin.button :datas="[
                        'routeName' => 'cms.our-connection.recycle-bin',
                        'label' => 'Recycle Bin',
                        'className' => 'btn-danger',
                        'permissions' => ['offer-banner-restore'],
                    ]" />
                        <x-backend.admin.button :datas="[
                            'routeName' => 'cms.our-connection.create',
                            'label' => 'Add New',
                            'permissions' => ['our_connection-create'],
                        ]" />
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-responsive table-striped datatable">
                        <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
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
    <x-backend.admin.details-modal :datas="['modal_title' => 'our_connection Details']" />
@endsection
@push('js')
    {{-- Datatable Scripts --}}
    <script src="{{ asset('datatable/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            let table_columns = [

                ['name', true, true],
                ['status', true, true],
                ['created_by', true, true],
                ['created_at', false, false],
                ['action', false, false],
            ];
            initializeDataTable(
                table_columns,
                '.datatable',
                10,
                [0, 1, 2, 3, 4],
                "{{ route('cms.our-connection.index') }}",
                "{{ route('update.sort.order') }}",
                'OurConnection'
            );
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
            let route = "{{ route('cms.our-connection.show', ['id']) }}";
            const detailsUrl = route.replace("id", id);
            const headers = [{
                    label: "Name",
                    key: "name"
                },
                {
                    label: "Image",
                    key: "modified_image",
                    type: "image"
                },
                {
                    label: "Website",
                    key: "website"
                },
                {
                    label: "Status",
                    key: "status_label",
                    color: "status_color",
                },
                {
                    label: "Description",
                    key: "description"
                },
            ];

            fetchAndShowModal(detailsUrl, headers, "#modal_data", "myModal");
        });
    </script>
@endpush
