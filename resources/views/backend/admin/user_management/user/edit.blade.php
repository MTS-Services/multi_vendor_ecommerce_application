@extends('backend.admin.layouts.master', ['page_slug' => 'user'])
@section('title', 'Edit User')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Edit User') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'um.user.index',
                        'label' => 'Back',
                        'permissions' => ['user-list', 'user-details', 'user-delete', 'user-status'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('um.user.update', encrypt($user->id)) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('First Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ $user->first_name }}" name="first_name"
                                        class="form-control" placeholder="Enter first name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'first_name']" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ $user->last_name }}" name="last_name"
                                        class="form-control" placeholder="Enter last name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'last_name']" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Username') }}</label>
                            <input type="text" name="username" value="{{ $user->username }}"
                                class="username form-control" placeholder="Enter username">
                            <span class="username-error invalid-feedback"></span>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'username']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Image') }}</label>
                            <input type="file" accept="image/*" name="uploadImage" data-actualName="image"
                                class="form-control filepond" id="image">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'image']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Email') }} <span class="text-danger">*</span></label>
                            <input type="text" name="email" value="{{ $user->email }}" class="form-control"
                                placeholder="Enter email">
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
    <script>
        $(document).ready(function() {
            const existingFiles = {
                "#image": "{{ $user->modified_image }}",
            };
            file_upload(["#image"], "uploadImage", "admin", existingFiles, false);

            cosnt username = $('.username');
            const error = $('.username-error');
            validateUsername(username, error);
        });
    </script>
    {{-- FilePond  --}}
@endpush
