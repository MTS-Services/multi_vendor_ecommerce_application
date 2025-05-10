@extends('backend.admin.layouts.master', ['page_slug' => 'product_tags'])
@section('title', 'Product Tag List')
@push('css')
<link rel="stylesheet" href="{{ asset('custom_litebox/litebox.css') }}">
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="cart-title">{{ __('Product Tag List') }}</h4>
                <x-backend.admin.button :datas="[
                        'routeName' => 'pm.product-tags.create',
                        'label' => 'Add New',
                        'permissions' => ['product-create'],
                    ]" />
            </div>
            <div class="card-body">
                <table class="table table-responsive table-striped datatable">
                    <thead>
                        <tr>
                            <th>{{ __('SL') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Slug') }}</th>
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
<x-backend.admin.details-modal :datas="['modal_title' => 'Product Tag Details']" />
@endsection
@push('js')
<script src="{{ asset('custom_litebox/litebox.js') }}"></script>
<script src="{{ asset('datatable/main.js') }}"></script>
<script>
    $(document).ready(function() {
        let table_columns = [

            ['name', true, true],
            ['slug', true, true],
            ['creater_id', true, true],
            ['created_at', false, false],
            ['action', false, false],
        ];
        const details = {
            table_columns: table_columns,
            main_class: '.datatable',
            displayLength: 10,
            main_route: "{{ route('pm.product-tags.index') }}",
            order_route: "{{ route('update.sort.order') }}",
            export_columns: [0, 1, 2, 3],
            model: 'ProductTag',
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
        let route = "{{ route('pm.product-tags.show', ['id']) }}";
        const detailsUrl = route.replace("id", id);
        const headers = [
            {
                label: "Sort Order",
                key: "sort_order"
            },
            {
                label: "Name",
                key: "name"
            },
            {
                label: "Slug",
                key: "slug"
            },
            {
                label: "Description",
                key: "description",
            }


        ];
        fetchAndShowModal(detailsUrl, headers, "#modal_data", "myModal");
    });
</script>
@endpush
