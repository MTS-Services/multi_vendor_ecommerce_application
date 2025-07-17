@extends('backend.admin.layouts.master', ['page_slug' => 'seller'])
@section('title', 'Seller List')
@section('content')
@push('css')
    <link rel="stylesheet" href="{{ asset('custom_litebox/litebox.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Seller List') }}</h4>
                    <div class="buttons">
                         <x-backend.admin.button :datas="[
                             'routeName' => 'sl.seller.recycle-bin',
                            'label' => 'Recycle Bin',
                            'className' => 'btn-danger',
                            'permissions' => ['seller-restore'],
                        ]" />   
                        <x-backend.admin.button :datas="[
                            'routeName' => 'sl.seller.create',
                            'label' => 'Add New',
                            'permissions' => ['seller-create'],
                        ]" />
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-striped datatable">
                        <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{ __(' Name') }}</th>
                                <th>{{ __('Email') }}</th>
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
                ['first_name', true, true], 
                ['email', true, true],
                ['status', true, true],
                ['is_verify', true, true],
                ['creater_by', true, true],
                ['created_at', false, false],
                ['action', false, false],
            ];
            initializeDataTable(
                table_columns,
                '.datatable',
                10,
                [0, 1,2,3,4,5,6],
                "{{ route('sl.seller.index') }}",
                "{{ route('update.sort.order') }}",
                'Seller'
            );
            initializeDataTable(details);
        })
    </script>
@endpush
    {{-- <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Seller List') }}</h4>
                    <div class="buttons">
                        <x-backend.admin.button :datas="[
                            'routeName' => 'sl.seller.recycle-bin',
                            'label' => 'Recycle Bin',
                            'className' => 'btn-danger',
                            'permissions' => ['permission-restore'],
                        ]" />
                        <x-backend.admin.button :datas="[
                            'routeName' => 'sl.seller.create',
                            'label' => 'Add New',
                            'permissions' => ['seller-create'],
                        ]" />
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-striped datatable">
                        <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
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
    {{-- <x-backend.admin.details-modal :datas="['modal_title' => 'Seller Details']" />
@endsection
@push('js')
 
    <script src="{{ asset('datatable/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            let table_columns = [

                ['first_name', true, true],
                ['email', true, true],
                ['status', true, true],
                ['is_verify', true, true],
                ['creater_id', true, true],
                ['created_at', false, false],
                ['action', false, false],
            ];
            const details = {
                table_columns: table_columns,
                main_class: '.datatable',
                displayLength: 10,
                main_route: "{{ route('sl.seller.index') }}",
                order_route: "{{ route('update.sort.order') }}",
                export_columns: [0, 1, 2, 3, 4, 5, 6],
                model: 'Seller',
            };
            initializeDataTable(details);
        })
    </script>
@endpush  --}}
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
            let route = "{{ route('sl.seller.show', ['id']) }}";
            const detailsUrl = route.replace("id", id);
            const headers = [{
                    label: "First Name",
                    key: "first_name"
                },
                {
                    label: "Last Name",
                    key: "last_name"
                },
                {
                    label: "Username",
                    key: "username"
                },
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
                    label: "Phone",
                    key: "phone"
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
                    label: "Shop Name",
                    key: "shop_name"
                },
                {
                    label: "Shop Slug",
                    key: "shop_slug"
                },
                {
                    label: "Shop Logo",
                    key: "modified_shop_logo",
                    type: "image"
                },
                {
                    label: "Shop Banner",
                    key: "modified_shop_banner",
                    type: "image"
                },
                {
                    label: "Business Phone Number",
                    key: "business_phone"
                },
                {
                    label: "Shop Description",
                    key: "shop_description"
                },
            ];
            fetchAndShowModal(detailsUrl, headers, "#modal_data", "myModal");
        });
    </script>
@endpush
