@extends('backend.hub.layouts.master', ['page_slug' => 'staff'])
@section('title', 'Staff Recycle List')
@push('css')
    <link rel="stylesheet" href="{{ asset('custom_litebox/litebox.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Staff Recycle Bin') }}</h4>
                    <div class="buttons">
                        <x-backend.hub.button :datas="[
                            'routeName' => 'sm.staff.index',
                            'label' => 'Back',
                            'permissions' => ['brand-list'],
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
                                <th>{{ __('Deleted By') }}</th>
                                <th>{{ __('Deleted Date') }}</th>
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
@endsection
@push('js')
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
                ['deleter_id', true, true],
                ['deleted_at', true, true],
                ['action', false, false],
            ];
            const details = {
                table_columns: table_columns,
                main_class: '.datatable',
                displayLength: 10,
                main_route: "{{ route('sm.staff.recycle-bin') }}",
                order_route: "{{ route('update.sort.order') }}",
                export_columns: [0, 1, 2, 3, 4, 5],
                model: 'Staff',
            };
            // initializeDataTable(details);

            initializeDataTable(details);
        })
    </script>
@endpush
