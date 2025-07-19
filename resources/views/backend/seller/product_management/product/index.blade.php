@extends('backend.seller.layouts.app', ['page_slug' => 'product'])

@section('title', 'Product List')

@push('css')
    <link rel="stylesheet" href="{{ asset('custom_litebox/litebox.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Product List') }}</h4>
                    <div class="buttons">
                        <x-backend.seller.button :datas="[
                            'routeName' => 'seller.pm.product.recycle-bin',
                            'label' => 'Recycle Bin',
                            'className' => 'btn-danger',
                        ]" />
                        <x-backend.seller.button :datas="[
                            'routeName' => 'seller.pm.product.create',
                            'label' => 'Add New',
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
                                    <th>{{ __('Seller') }}</th>
                                    <th>{{ __('Brand') }}</th>
                                    <th>{{ __('Category') }}</th>
                                    <th>{{ __('Tax Class') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Featured') }}</th>
                                    <th>{{ __('Published') }}</th>
                                    <th>{{ __('Created By') }}</th>
                                    <th>{{ __('Created Date') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Product Details Modal --}}
    <x-backend.seller.details-modal :datas="['modal_title' => 'Product Details']" />
@endsection

@push('js')
    <script src="{{ asset('custom_litebox/litebox.js') }}"></script>
    <script src="{{ asset('datatable/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            let table_columns = [
                ['name', true, true],
                ['seller_id', true, true],
                ['brand_id', true, true],
                ['category_id', true, true],
                ['tax_class_id', true, true],
                ['status', true, true],
                ['is_featured', true, true],
                ['is_published', true, true],
                ['creater_id', true, true],
                ['created_at', false, false],
                ['action', false, false],
            ];
            const details = {
                table_columns: table_columns,
                main_class: '.datatable',
                displayLength: 10,
                main_route: "{{ route('seller.pm.product.index') }}",
                order_route: "{{ route('update.sort.order') }}",
                export_columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
                model: 'Product',
            };
            initializeDataTable(details);
        });
    </script>
@endpush

@push('js')
    {{-- Show Product Details --}}
    <script src="{{ asset('modal/details_modal.js') }}"></script>
    <script>
        $(document).on("click", ".view", function() {
            let id = $(this).data("id");
            let route = "{{ route('seller.pm.product.show', ['id']) }}";
            const detailsUrl = route.replace("id", id);
            const headers = [{
                    label: "Name",
                    key: "name"
                },
                {
                    label: "Slug",
                    key: "slug"
                },
                {
                    label: "Seller",
                    key: "seller_name"
                },
                {
                    label: "Brand",
                    key: "brand_name"
                },
                {
                    label: "Category",
                    key: "category_name"
                },
                {
                    label: "Tax Class",
                    key: "tax_class_name"
                },
                {
                    label: "Status",
                    key: "status_label",
                    color: "status_color"
                },
                {
                    label: "Featured",
                    key: "featured_label",
                    color: "featured_color"
                },
                {
                    label: "Published",
                    key: "published_label",
                    color: "published_color"
                },
                {
                    label: "Description",
                    key: "description"
                },
                {
                    label: "Meta Title",
                    key: "meta_title"
                },
                {
                    label: "Meta Description",
                    key: "meta_description"
                },
            ];
            fetchAndShowModal(detailsUrl, headers, "#modal_data", "myModal");
        });
    </script>
@endpush
