@extends('backend.seller.layouts.app', ['page_slug' => 'seller'])
@section('title', 'Seller Recycle Bin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Seller Recycle Bin') }}</h4>
                    <div class="buttons">
                        <x-backend.seller.button :datas="[
                            'routeName' => 'seller.sm.seller.index',
                            'label' => 'Back',
                            'permissions' => ['seller-list'],
                        ]" />
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped datatable">
                            <thead class="w-100">
                                <tr>
                                    <th>{{ __('SL') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Country') }}</th>
                                    <th>{{ __('City') }}</th>
                                    <th>{{ __('Operation') }}</th>
                                    <th>{{ __('Hub') }}</th>
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
                ['country_id', true, true],
                ['city_id', true, true],
                ['operation_area_id', true, true],
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
                main_route: "{{ route('seller.sm.seller.recycle-bin') }}",
                order_route: "{{ route('update.sort.order') }}",
                export_columns: [0, 1, 2, 3, 4, 5, 6],
                model: 'Seller',
            };
            // initializeDataTable(details);

            initializeDataTable(details);
        })
    </script>
@endpush
