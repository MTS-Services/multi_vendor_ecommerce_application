@extends('backend.admin.layouts.master', ['page_slug' => 'product_attribute_value'])
@section('title', 'Create Product Attribute Value')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Create Product Attribute Value') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'pm.product-attribute-value.index',
                        'label' => 'Back',
                        'permissions' => ['product_attribute_value-list'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('pm.product-attribute-value.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>{{ __(' Attribute Name') }}  <span class="text-danger">*</span></label>
                            <select name="product_attribute_id" class="form-control">
                                <option value="" selected disabled>{{ __('Select Attribute Name') }}</option>
                                @foreach ($product_attribute as $product_attribute_value)
                                    <option value="{{ $product_attribute_value->id }}" {{ old('product_attribute_id') == $product_attribute_value->id ? 'selected' : '' }}>
                                        {{ $product_attribute_value->name }}</option>
                                @endforeach
                            </select>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'product_attribute_id']" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Value') }}  <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('value') }}" id="title" name="value" class="form-control"
                                placeholder="Enter value">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'value']" />
                        </div>


                        <div class="form-group float-end">
                            <input type="submit" class="btn btn-primary" value="Create">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
