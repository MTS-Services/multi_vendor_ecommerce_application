@extends('backend.admin.layouts.master', ['page_slug' => 'category'])
@section('title', 'Edit Category')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Edit Category') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'pm.category.index',
                        'label' => 'Back',
                        'permissions' => ['Category-list', 'Category-details', 'Category-delete', 'Category-status'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('pm.category.update', encrypt($Category->id)) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ $Category->name }}" class="form-control"
                                placeholder="Enter name">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />

                                <div class="form-group">
                                    <label>{{ __('Slug') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="slug" value="{{ $Category->slug }}" class="form-control"
                                        placeholder="Enter Slug">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'slug']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Image') }}</label>
                            <input type="file" accept="image/*" name="uploadImage" data-actualName="image"
                                class="form-control filepond" id="image">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'image']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Meta Title') }} <span class="text-danger">*</span></label>
                            <input type="text" name="meta_title" value="{{ $Category->meta_title }}" class="form-control"
                                placeholder="Enter meta title">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'meta_title']" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Meta Description') }} <span class="text-danger">*</span></label>
                            <input type="text" name="meta_description" value="{{ $Category->meta_description }}" class="form-control"
                                placeholder="Enter meta description">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'meta_description']" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Description') }} <span class="text-danger">*</span></label>
                            <input type="text" name="description" value="{{ $Category->description }}" class="form-control"
                                placeholder="Enter description">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'description']" />
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
    {{-- FilePond  --}}
    <script src="{{ asset('filepond/filepond.js') }}"></script>
    <script src="{{ asset('ckEditor5/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            const existingFiles = {
                "#image":"{{ storage_url($Category->image)}}",
            }
            file_upload(["#image"], "uploadImage", "admin", existingFiles, false);
        });
    </script>
    {{-- FilePond  --}}
@endpush
