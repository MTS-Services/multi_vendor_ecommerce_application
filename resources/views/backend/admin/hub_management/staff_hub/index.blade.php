@extends('backend.admin.layouts.master', ['page_slug' => 'staff hub'])
@section('title', 'Staff Hub List')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Staff Hub List') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'hm.staff.create',
                        'label' => 'Add New',
                        'permissions' => ['staff-create'],
                    ]" />
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-striped datatable">
                        <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>                                                      
                                <th>{{ __('First Name') }}</th>
                                <th>{{ __('Email') }}</th>
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
    {{-- <x-backend.admin.details-modal :datas="['modal_title' => 'Hub Details']" /> --}}
@endsection
@push('js')
    <script src="{{ asset('datatable/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            let table_columns = [
                ['first_name', true, true],
                // ['last_name', true, true],
                // ['user_name', true, true],
                ['image', true, true],
                ['email', true, true],
                ['phone', true, true],
                ['status', true, true],
                ['created_by', true, true],
                ['created_at', false, false],
                ['action', false, false],
            ];
            const details = {
                table_columns: table_columns,
                main_class: '.datatable',
                displayLength: 10,
                main_route: "{{ route('hm.staff.index') }}",
                order_route: "{{ route('update.sort.order') }}",
                export_columns: [0, 1, 2, 3, 4, 5, 6, 7],
                model: 'Staff',
            };
            initializeDataTable(details);
        })
    </script>
@endpush
@push('js')
    {{-- Show details scripts --}}
    {{-- <script src="{{ asset('modal/details_modal.js') }}"></script>
     <script>

        $(document).on("click", ".view", function() {
            let id = $(this).data("id");
           let route = "{{ route('hm.staff.show', ) }}";
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
                        label: "User Name",
                        key: "user_name"
                    },
                    {
                        label:"Image",
                        key: "image",
                        
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
                   



            ];
            fetchAndShowModal(detailsUrl, headers, "#modal_data", "myModal");
        });
    </script> --}}
@endpush
