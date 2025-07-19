@extends('backend.admin.layouts.master', ['page_slug' => 'staff'])
@section('title', 'Staff List')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Create Staff') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'hm.staff.index',
                        'label' => 'Back',
                        'permissions' => ['staff-list', 'staff-details', 'staff-delete', 'staff-status'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('hm.staff.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group pt-3">
                                    <label>{{ __('First Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('first_name') }}" name="first_name"
                                        class="form-control" placeholder="Enter first name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'first_name']" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pt-3">
                                    <label>{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('last_name') }}" name="last_name"
                                        class="form-control" placeholder="Enter last name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'last_name']" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group pt-3">
                                    <label>{{ __('Username') }}</label>
                                    <input type="text" value="{{ old('username') }}" name="username"
                                        class="form-control username" placeholder="Enter username">
                                    <span class="username-error invalid-feedback"></span>
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'username']" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pt-3">
                                    <label>{{ __('Hub') }} <span class="text-danger">*</span></label>
                                    <select name="hub_id" class="form-control">
                                        <option value="" selected hidden>{{ __('Select Hub') }}</option>
                                        @foreach ($hubs as $hub)
                                            <option value="{{ $hub->id }}"
                                                {{ old('hub') == $hub->id ? 'selected' : '' }}>
                                                {{ $hub->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'hub_id']" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group pt-3">
                            <label>{{ __('Image') }}</label>
                            <input type="file" name="uploadImage" data-actualName="image" class="form-control filepond"
                                id="image" accept="image/*">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'image']" />
                        </div>
                        <div class="form-group pt-3">
                            <label>{{ __('Email') }} <span class="text-danger">*</span></label>
                            <input type="text" name="email" class="form-control" placeholder="Enter email">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'email']" />
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group pt-3">
                                    <label>{{ __('Password') }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Enter password">
                                        <x-backend.show-password />
                                    </div>
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'password']" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pt-3">
                                    <label>{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="Enter confirm password">
                                        <x-backend.show-password />
                                    </div>
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

            // username validation
            const username = $('.username');
            const error = $('.username-error');
            validateUsername(username, error);
        });
    </script>
    {{-- FilePond  --}}
@endpush