@extends('backend.admin.layouts.master', ['page_slug' => 'brand'])
@section('title', 'Create Brand')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="cart-title">{{ __('Create Brand') }}</h4>
                <x-backend.admin.button :datas="[
                        'routeName' => 'setup.brand.index',
                        'label' => 'Back',
                        'permissions' => ['brand-list'],
                    ]" />
            </div>
            <div class="card-body">
                <form action="{{ route('setup.brand.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                        <input type="text" value="{{ old('name') }}" id="title" name="name" class="form-control"
                            placeholder="Enter name">
                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />
                    </div>
                    {{-- Slug --}}
                    <div class="form-group">
                        <label>{{ __('Slug') }}<span class="text-danger">*</span></label>
                        <input type="text" value="{{ old('slug') }}" id="slug" name="slug" class="form-control"
                            placeholder="Enter slug">
                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'slug']" />
                    </div>                    
                    {{-- Logo --}}
                    <div class="form-group">
                        <label>{{ __('Logo') }}<span class="text-danger">*</span></label>
                        <input type="file" value="{{ old('logo') }}" id="logo" name="logo" class="form-control">
                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'logo']" />
                    </div>
                    {{-- Website --}}
                    <div class="form-group">
                        <label>{{__('Website')}}</label>
                        <input type="url" value="{{ old('website') }}" id="website" name="website" class="form-control"
                            placeholder="Enter website">
                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'website']" />
                    </div>
                    {{-- Meta_title --}}
                    <div class="form-group">
                        <label>{{__('Meta_title')}}</label>
                        <input type="text" value="{{ old('meta_title') }}" id="meta_title" name="meta_title" class="form-control"
                            placeholder="Enter meta_title">
                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'meta_title']" />
                    </div>
                    {{-- Meta_description --}}
                    <div class="form-group">
                        <label>{{__('Meta_description')}}</label>
                        <textarea name="meta_description" class="form-control" id="meta_description" placeholder="Enter meta_description">{{old('meta_description')}}</textarea>
                    </div>
                    {{-- Description --}}
                    <div class="form-group">
                        <label>{{__('Description')}}</label>
                        <textarea name="description" class="form-control" id="description" placeholder="Enter description">{{old('description')}}</textarea>
                    </div>
                    {{-- Status --}}
                    <div class="form-group">
                        <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="active" value="1"
                                {{ old('status') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="active">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inactive" value="0"
                                {{ old('status') == '0' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inactive">Inactive</label>
                        </div>
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
@push('js')
<script src="{{ asset('ckEditor5/main.js') }}"></script>
@endpush