@extends('backend.admin.layouts.master', ['page_slug' => 'our_connection'])
@section('title', 'Our Connection Recycle Bin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Our Connection Recycle Bin') }}</h4>
                    <div class="buttons">
                        <x-backend.admin.button :datas="[
                            'routeName' => 'cms.our-connection.index',
                            'label' => 'Back',
                            'permissions' => ['our_connection-list'],
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
                ['name', true, true],
                ['status', true, true],
                ['deleted_by', true, true],
                ['deleted_at', true, true],
                ['action', false, false],
            ];
            initializeDataTable(
                table_columns,
                '.datatable',
                10,
                [0, 1, 2, 3, 4, 5],
                "{{ route('cms.our-connection.recycle-bin') }}",
                "{{ route('update.sort.order') }}",
                'OurConnection'
            );
        })
    </script>
@endpush
