@extends('backend.seller.layouts.app', ['page_slug' => 'profile'])

@section('title', 'Edit Profile')

@push('css')
    <style>
        .card {
            border-radius: 10px;
        }

        .form-control {
            border-radius: 6px;
            box-shadow: none;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .btn {
            border-radius: 6px;
        }

        .text-danger {
            font-size: 0.875rem;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- Profile Edit Card --}}
            <div class="col-lg-12 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white">
                        <h4 class="mb-0">Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('seller.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Full Name') }}</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $seller->name) }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Email') }}</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', $seller->email) }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Username') }}</label>
                                    <input type="text" name="username" class="form-control"
                                        value="{{ old('username', $seller->username) }}">
                                    @error('username')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Profile Image') }}</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Gender') }}</label>
                                    <select name="gender" class="form-control">
                                        @foreach ($seller->getGenderLabels() as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('gender') == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Emergency Phone') }}</label>
                                    <input type="text" name="emergency_phone" class="form-control"
                                        value="{{ old('emergency_phone', $seller->emergency_phone) }}">
                                    @error('emergency_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Phone') }}</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ old('phone', $seller->phone) }}">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{ __("Father's Name") }}</label>
                                    <input type="text" name="father_name" class="form-control"
                                        value="{{ old('father_name', $seller->father_name) }}">
                                    @error('father_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{ __("Mother's Name") }}</label>
                                    <input type="text" name="mother_name" class="form-control"
                                        value="{{ old('mother_name', $seller->mother_name) }}">
                                    @error('mother_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Present Address') }}</label>
                                    <textarea name="present_address" class="form-control">{{ old('present_address', $seller->present_address) }}</textarea>
                                    @error('present_address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Permanent Address') }}</label>
                                    <textarea name="permanent_address" class="form-control">{{ old('permanent_address', $seller->permanent_address) }}</textarea>
                                    @error('permanent_address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-right mt-4">
                                <button class="btn btn-primary px-4">{{ __('Update Profile') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Password Change Card --}}
            <div class="col-lg-12 mt-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white">
                        <h4 class="mb-0">{{ __('Change Password') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('seller.profile.password.update') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Current Password') }}</label>
                                    <input type="password" name="current_password" class="form-control">
                                    @error('current_password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>{{ __('New Password') }}</label>
                                    <input type="password" name="new_password" class="form-control">
                                    @error('new_password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="new_password_confirmation" class="form-control">
                                    @error('new_password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-success px-4">{{ __('Change Password') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
