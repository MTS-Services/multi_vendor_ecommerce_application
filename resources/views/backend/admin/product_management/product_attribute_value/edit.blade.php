@extends('backend.admin.layouts.master', ['page_slug' => 'product_attribute_value'])
@section('title', 'Edit Attribute Value')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Edit Attribute Value') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'pm.product-attribute-value.index',
                        'label' => 'Back',
                        'permissions' => ['product_attribute_value-list',],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('pm.product-attribute-value.update', encrypt($$product_attribute_value->id)) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label>{{ __('Name') }}  <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $$product_attribute_value->name }}" id="title" name="name" class="form-control"
                                placeholder="Enter name">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Product Attribute Value Name') }}  <span class="text-danger">*</span></label>
                            <select name="product_attribute_id" class="form-control">
                                <option value="" selected disabled>{{ __('Select Attribute Value Name') }}</option>
                                @foreach ($product_attribute as $product_attribute_value_two)
                                    <option value="{{ $product_attribute_value_two->id }}" {{ $product_attribute_value->parent_id == $$product_attribute_value_two->id ? 'selected' : '' }}>
                                        {{ $$product_attribute_value_two->name }}</option>
                                @endforeach
                            </select>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'parent_id']" />
                        </div>
                        <div class="form-group float-end">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
