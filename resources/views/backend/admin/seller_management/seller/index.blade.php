@extends('backend.admin.layouts.master', ['page_slug' => 'seller'])
@section('title', 'Seller List')
@push('css')
    <link rel="stylesheet" href="{{ asset('custom_litebox/litebox.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Seller List') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'sl.seller.create',
                        'label' => 'Add New',
                        'permissions' => ['seller-create'],
                    ]" />
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-striped datatable">
                        <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Username') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Gender') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Verify Status') }}</th>
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
    <x-backend.admin.details-modal :datas="['modal_title' => 'Seller Details']" />
@endsection
@push('js')
    <script src="{{ asset('custom_litebox/litebox.js') }}"></script>
    {{-- Datatable Scripts --}}
    <script src="{{ asset('datatable/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            let table_columns = [

                ['name', true, true],
                ['username', true, true],
                ['email', true, true],
                ['gender', true, true],
                ['status', true, true],
                ['is_verify', true, true],
                ['created_by', true, true],
                ['created_at', false, false],
                ['action', false, false],
            ];
            const details = {
                table_columns: table_columns,
                main_class: '.datatable',
                displayLength: 10,
                main_route: "{{ route('sl.seller.index') }}",
                order_route: "{{ route('update.sort.order') }}",
                export_columns: [0, 1, 2, 3, 4, 5, 6, 7],
                model: 'Seller',
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
            let route = "{{ route('sl.seller.show', ['id']) }}";
            const detailsUrl = route.replace("id", id);
            const headers = [{
                    label: "Name",
                    key: "name"
                },
                {
                    label: "Username",
                    key: "username"
                },
                {
                    lavel:"Gender",
                    key: "gender"
                }
                {
                    label: "Image",
                    key: "modified_image",
                    type: "image"
                },
                {
                    label: "Email",
                    key: "email"
                },
                {
                    label: "Status",
                    key: "status_label",
                    color: "status_color",
                },
                {
                    label: "Verify Status",
                    key: "verify_label",
                    color: "verify_color",
                },
                {
                    label: "Gender",
                    key: "gender_label",
                    color: "gender_color",
                },
            ];
            fetchAndShowModal(detailsUrl, headers, "#modal_data", "myModal");
        });
    </script>
@endpush
