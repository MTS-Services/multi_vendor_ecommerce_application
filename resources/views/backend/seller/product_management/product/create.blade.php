@extends('backend.seller.layouts.app', ['page_slug' => 'product'])

@section('title', 'Add New Product')

@push('css')
    <link rel="stylesheet" href="{{ asset('custom_litebox/litebox.css') }}">
@endpush

@section('content')
    

        <div class="row">
            {{-- Left: Product Info --}}
            <div class="col-md-12">
                <div class="card m-3">
                    <div class="card-header">
                        <h4>{{ __('Product Information') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('seller.pm.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ old('name') }}" id="title" name="name"
                                            class="form-control" placeholder="Enter name">
                                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Slug') }} <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ old('slug') }}" name="slug"
                                            class="form-control" placeholder="Enter slug">
                                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'slug']" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('SKU') }} <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ old('sku') }}" name="sku"
                                            class="form-control" placeholder="Enter SKU">
                                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'sku']" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Seller') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{ auth()->check() ? auth()->user()->first_name : '' }}" disabled>
                                        <input type="hidden" name="seller_id" value="{{ auth()->check() ? auth()->user()->id : '' }}">
                                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'seller_id']" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Brand') }}</label>
                                        <select name="brand_id" class="form-control">
                                            <option value="">{{ __('Select brand') }}</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'brand_id']" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Category') }} <span class="text-danger">*</span></label>
                                        <select name="category_id" class="form-control">
                                            <option value="">{{ __('Select category') }}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'category_id']" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Tax Class') }} <span class="text-danger">*</span></label>
                                        <select name="tax_class_id" class="form-control">
                                            <option value="">{{ __('Select tax class') }}</option>
                                            @foreach ($tax_classes as $tax)
                                                <option value="{{ $tax->id }}"
                                                    {{ old('tax_class_id') == $tax->id ? 'selected' : '' }}>
                                                    {{ $tax->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'tax_class_id']" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ __('Description') }}</label>
                                        <textarea name="description" class="form-control" rows="5" placeholder="Enter full description">{{ old('description') }}</textarea>
                                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'description']" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ __('Short Description') }}</label>
                                        <input type="text" value="{{ old('short_description') }}"
                                            name="short_description" class="form-control"
                                            placeholder="Enter short description">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ __('Meta Title') }}</label>
                                        <input type="text" value="{{ old('meta_title') }}" name="meta_title"
                                            class="form-control" placeholder="Meta title">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ __('Meta Description') }}</label>
                                        <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ __('Meta Keywords') }}</label>
                                        <textarea name="meta_keywords" class="form-control" rows="2">{{ old('meta_keywords') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4 text-end">
                                <button type="submit" class="btn btn-primary">{{ __('Create Product') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('js')
    <script src="{{ asset('ckEditor5/main.js') }}"></script>

@endpush
