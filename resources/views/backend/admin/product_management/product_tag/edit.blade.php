@extends('backend.admin.layouts.master', ['page_slug' => 'product_tags'])
@section('title', 'Edit Product Tags')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="cart-title">{{ __('Edit Product Tags') }}</h4>
                <x-backend.admin.button :datas="[
                        'routeName' => 'pm.product-tags.index',
                        'label' => 'Back',
                        'permissions' => ['product-list'],
                    ]" />
            </div>
            <div class="card-body">
                <form action="{{ route('pm.product-tags.update', encrypt($productTag->id)) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    {{-- Name --}}
                    <div class="form-group">
                        <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                        <input type="text" value="{{ old('name', $productTag->name) }}" id="title" name="name" class="form-control"
                            placeholder="Enter name">
                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />
                    </div>
                    {{-- Slug --}}
                    <div class="form-group">
                        <label>{{ __('Slug') }}<span class="text-danger">*</span></label>
                        <input type="text" value="{{ old('slug', $productTag->slug) }}" id="slug" name="slug" class="form-control"
                            placeholder="Enter slug">
                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'slug']" />
                    </div>
                    {{-- Description --}}
                    <div class="form-group">
                        <label>{{__('Description')}}</label>
                        <textarea name="description" class="form-control" id="description" placeholder="Enter description">{{ old('description', $productTag->description) }}</textarea>
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
@push('js')
<script src="{{ asset('ckEditor5/main.js') }}"></script>

{{-- FilePond  --}}
@endpush