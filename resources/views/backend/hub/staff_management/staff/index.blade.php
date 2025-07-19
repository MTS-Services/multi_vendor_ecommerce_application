@extends('backend.hub.layouts.master', ['page_slug' => 'staff'])
@section('title', 'Staff List')
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
                         <x-backend.hub.button :datas="[
                            'routeName' => 'sm.staff.recycle-bin',
                            'label' => 'Recycle Bin',
                            'className' => 'btn-danger',
                        ]" />
                        <x-backend.hub.button :datas="[
                            'routeName' => 'sm.staff.create',
                            'label' => 'Add New',
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
                                <th>{{ __('Hub') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Verified') }}</th>
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
    <x-backend.admin.details-modal :datas="['modal_title' => 'Staff Details']" />
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
                ['hub_id', true, true],
                ['status', true, true],
                ['email_verified_at', true, true],
                ['creater_id', true, true],
                ['created_at', true, true],
                ['action', false, false],
            ];
            const details = {
                table_columns: table_columns,
                main_class: '.datatable',
                displayLength: 10,
                main_route: "{{ route('sm.staff.index') }}",
                order_route: "{{ route('update.sort.order') }}",
                export_columns: [0, 1, 2, 3, 4, 5, 6, 7],
                model: 'Staff',
            };
            // initializeDataTable(details);

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
            let route = "{{ route('sm.staff.show', ['id']) }}";
            const detailsUrl = route.replace("id", id);
            const headers = [
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
                    label: "Verified",
                    key: "email_verified_at",
                    color: "verified_color",
                },
            ];
            fetchAndShowModal(detailsUrl, headers, "#modal_data", "myModal");
        });
    </script>
@endpush