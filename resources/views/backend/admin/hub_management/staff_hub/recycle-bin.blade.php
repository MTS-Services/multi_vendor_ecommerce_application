@extends('backend.admin.layouts.master', ['page_slug' => 'staff'])
@section('title', 'Staff Recycle Bin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Staff Recycle Bin') }}</h4>
                    <div class="buttons">
                        <x-backend.admin.button :datas="[
                            'routeName' => 'hm.staff.index',
                            'label' => 'Back',
                            'permissions' => ['staff-list'],
                        ]" />
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-striped datatable">
                        <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{__('Hub Name')}}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Verify Status') }}</th>
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
                ['hub_id', true, true],
                ['first_name', true, true],
                ['email', true, true],
                ['status', true, true],
                ['is_verify', true, true],
                ['deleted_by', true, true],
                ['deleted_at', true, true],
                ['action', false, false],
            ];
            initializeDataTable(
                table_columns,
                '.datatable',
                10,
                [0, 1, 2, 3, 4, 5, 6, 7],
                "{{ route('hm.staff.recycle-bin') }}",
                "{{ route('update.sort.order') }}",
                'Staff'
            );
        })
    </script>
@endpush
