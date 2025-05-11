@extends('backend.admin.layouts.master', ['page_slug' => 'our_connection'])
@section('title', 'Create Our Connection')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="cart-title">{{ __('Create Our Connection') }}</h4>
                <x-backend.admin.button :datas="[
                        'routeName' => 'cms.our-connection.index',
                        'label' => 'Back',
                        'permissions' => ['our_connection-list'],
                    ]" />
            </div>
            <div class="card-body">
                <form action="{{ route('cms.our-connection.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                        <input type="text" value="{{ old('name') }}" id="title" name="name" class="form-control"
                            placeholder="Enter name">
                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />
                    </div>
                    {{-- Logo --}}
                    <div class="form-group">
                        <label>{{ __('image') }}<span class="text-danger">*</span></label>
                        <input type="file" name="uploadImage" data-actualName="image" class="form-control filepond"
                            id="image" accept="image/*">
                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'image']" />
                    </div>
                    {{-- Website --}}
                    <div class="form-group">
                        <label>{{__('Website')}}</label>
                        <input type="url" value="{{ old('website') }}" id="website" name="website" class="form-control"
                            placeholder="Enter website">
                        <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'website']" />
                    </div>
                    {{-- Meta_title --}}
                    {{-- Description --}}
                    <div class="form-group">
                        <label>{{__('Description')}}</label>
                        <textarea name="description" class="form-control" id="description" placeholder="Enter description">{{old('description')}}</textarea>
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
{{-- FilePond  --}}
<script src="{{ asset('filepond/filepond.js') }}"></script>
<script>
    $(document).ready(function() {
        file_upload(["#image"], "uploadImage", "admin", [], false);
    });
</script>
{{-- FilePond  --}}
@endpush
