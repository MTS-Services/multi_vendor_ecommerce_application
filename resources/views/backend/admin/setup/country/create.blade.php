@extends('backend.admin.layouts.master', ['page_slug' => 'country'])
@section('title', 'Create Country')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Create Country') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'sc.country.index',
                        'label' => 'Back',
                        'permissions' => ['country-list', 'country-details', 'country-delete', 'country-status'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('sc.country.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                placeholder="Enter name">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Slug') }}<span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('slug') }}" name="slug" class="form-control"
                                placeholder="Enter slug">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'slug']" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Description') }} <span class="text-danger">*</span></label>
                            <textarea type="text" name="description" class="form-control" placeholder="Description"></textarea>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'description']" />
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
    {{-- FilePond  --}}
    <script src="{{ asset('filepond/filepond.js') }}"></script>
    {{-- <script>
        $(document).ready(function() {
            file_upload(["#image"], "uploadImage", "admin", [], false);
        });
    </script> --}}
    {{-- FilePond  --}}
@endpush
