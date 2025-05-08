@extends('backend.admin.layouts.master', ['page_slug' => 'user'])
@section('title', 'Create User')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Create User') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'um.user.index',
                        'label' => 'Back',
                        'permissions' => ['user-list', 'user-details', 'user-delete', 'user-status'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('um.user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('First Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('first_name') }}" name="first_name"
                                        class="form-control" placeholder="Enter first name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'first_name']" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('last_name') }}" name="last_name"
                                        class="form-control" placeholder="Enter last name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'last_name']" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Username') }}</label>
                            <input type="text" value="{{ old('username') }}" name="username"
                                class="username form-control" placeholder="Enter username">
                            <span class="username-error invalid-feedback"></span>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'username']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Image') }}</label>
                            <input type="file" name="uploadImage" data-actualName="image" class="form-control filepond"
                                id="image" accept="image/*">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'image']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Email') }} <span class="text-danger">*</span></label>
                            <input type="text" name="email" class="form-control" placeholder="Enter email">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'email']" />
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>{{ __('Password') }} <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter password">
                                    <button type="button" class="showpassword"><i class="fas fa-eye"></i></button>
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'password']" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Enter confirm password">
                                    <button type="button" class="showpassword"><i class="fas fa-eye"></i></button>
                                </div>
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
    {{-- FilePond  --}}
    <script src="{{ asset('filepond/filepond.js') }}"></script>
    <script>
        $(document).ready(function() {
            file_upload(["#image"], "uploadImage", "admin", [], false);
        });

        // username validation
        const username = $('.username');
        const error = $('.username-error');
        validateUsername(username, error);
    </script>
    {{-- FilePond  --}}
@endpush
