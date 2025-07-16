@extends('backend.admin.layouts.master', ['page_slug' => 'staff'])
@section('title', 'Admin List')
@push('css')
    <link rel="stylesheet" href="{{ asset('custom_litebox/litebox.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Staff List') }}</h4>
                    <div class="buttons">
                         <x-backend.admin.button :datas="[
                             'routeName' => 'hm.staff.recycle-bin',
                            'label' => 'Recycle Bin',
                            'className' => 'btn-danger',
                            'permissions' => ['staff-restore'],
                        ]" />   
                        <x-backend.admin.button :datas="[
                            'routeName' => 'hm.staff.create',
                            'label' => 'Add New',
                            'permissions' => ['staff-create'],
                        ]" />
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-striped datatable">
                        <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{__('Hub Name')}}</th>
                                <th>{{ __('First Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Verify ') }}</th>
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
                ['hub_id', true, true],
                ['first_name', true, true], 
                ['email', true, true],
                ['status', true, true],
                ['is_verify', true, true],
                ['created_by', true, true],
                ['created_at', true, true],

                ['action', false, false],
            ];
            initializeDataTable(
                table_columns,
                '.datatable',
                10,
                [0, 1,2,3,4,5,6,7],
                "{{ route('hm.staff.index') }}",
                "{{ route('update.sort.order') }}",
                'Staff'
            );
        })
    </script>
@endpush
@push('js')
    <script src="{{ asset('modal/details_modal.js') }}"></script>
    <script>
        // Event listener for viewing details
        $(document).on("click", ".view", function() {
            let id = $(this).data("id");
            let route = "{{ route('hm.staff.show', ['id']) }}";
            const detailsUrl = route.replace("id", id);
            const headers = [

                { label: "Hub",
                    key: "hub_id"
                },
                {
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
            ];
            fetchAndShowModal(detailsUrl, headers, "#modal_data", "myModal");
        });
    </script>
@endpush
