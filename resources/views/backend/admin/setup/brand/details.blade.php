@extends('backend.admin.layouts.master', ['page_slug' => 'brand'])
@section('title', 'Brand Details')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="cart-title">{{ __('Brand Details') }}</h4>
                <x-backend.admin.button :datas="[
                        'routeName' => 'setup.brand.index',
                        'label' => 'Back',
                        'permissions' => ['brand-list'],
                    ]" />
            </div>
            <div class="card-body">

                {{-- Name --}}
                <div class="form-group">
                    <label>{{ __('Name') }}:</label>
                    <p>{{ $brand->name }}</p>
                </div>

                {{-- Slug --}}
                <div class="form-group">
                    <label>{{ __('Slug') }}:</label>
                    <p>{{ $brand->slug }}</p>
                </div>
                {{-- Featured --}}
                <div class="form-group">
                    <label>{{ __('Featured') }}:</label>
                    <p>{{ $brand->featured }}</p>
                </div>

                {{-- Logo --}}
                <div class="form-group">
                    <label>{{ __('Logo') }}:</label><br>
                    @if($brand->logo)
                        <img src="{{ asset('uploads/brand/'.$brand->logo) }}" alt="Brand Logo" width="100">
                    @else
                        <p>No logo uploaded</p>
                    @endif
                </div>

                {{-- Website --}}
                <div class="form-group">
                    <label>{{ __('Website') }}:</label>
                    <p><a href="{{ $brand->website }}" target="_blank">{{ $brand->website }}</a></p>
                </div>

                {{-- Meta Title --}}
                <div class="form-group">
                    <label>{{ __('Meta Title') }}:</label>
                    <p>{{ $brand->meta_title }}</p>
                </div>

                {{-- Meta Description --}}
                <div class="form-group">
                    <label>{{ __('Meta Description') }}:</label>
                    <p>{{ $brand->meta_description }}</p>
                </div>

                {{-- Description --}}
                <div class="form-group">
                    <label>{{ __('Description') }}:</label>
                    <p>{{ $brand->description }}</p>
                </div>

                {{-- Status --}}
                <div class="form-group">
                    <label>{{ __('Status') }}:</label>
                    <p>
                        @if($brand->status == 1)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
