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
                                    <label>{{__('Full Name')}}</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $seller->name}}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{__('Email')}}</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $seller->email }}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{__('Username')}}</label>
                                    <input type="text" name="username" class="form-control"
                                        value="{{ $seller->username }}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{__('Profile Image')}}</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{__('Status')}}</label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{ $seller->status === 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $seller->status === 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{__('Is Verified')}}</label>
                                    <select name="is_verify" class="form-control">
                                        <option value="1" {{ $seller->is_verify === 1 ? 'selected' : '' }}>Verified
                                        </option>
                                        <option value="0" {{ $seller->is_verify === 0 ? 'selected' : '' }}>Not Verified
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{__('Gender')}}</label>
                                    <select name="gender" class="form-control">
                                        <option value="male" {{ $seller->gender === 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female" {{ $seller->gender === 'female' ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="others" {{ $seller->gender === 'others' ? 'selected' : '' }}>Others
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{__('Email Verified At')}}</label>
                                    <input type="date" name="email_verified_at" class="form-control"
                                        value="{{ $seller->email_verified_at ?? 'Not set' }}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{__('OTP Sent At')}}</label>
                                    <input type="datetime-local" name="otp_send_at" class="form-control"
                                        value="{{ $seller->otp_send_at ?? 'Not set' }}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{__('Emergency Phone')}}</label>
                                    <input type="text" name="emergency_phone" class="form-control"
                                        value="{{ $seller->emergency_phone ?? 'Not set' }}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{__('Phone')}}</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ $seller->phone ?? 'Not set' }}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{__("Father's Name")}}</label>
                                    <input type="text" name="father_name" class="form-control"
                                        value="{{ $seller->father_name ?? 'Not set' }}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{__("Mother's Name")}}</label>
                                    <input type="text" name="mother_name" class="form-control"
                                        value="{{ $seller->mother_name ?? 'Not set' }}">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{__('Present Address')}}</label>
                                    <textarea name="present_address" class="form-control">{{ $seller->present_address ?? 'Not set' }}</textarea>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>{{__('Permanent Address')}}</label>
                                    <textarea name="permanent_address" class="form-control">{{ $seller->permanent_address ?? 'Not set' }}</textarea>
                                </div>
                            </div>

                            <div class="text-right mt-4">
                                <button class="btn btn-primary px-4">{{__('Update Profile')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Password Change Card --}}
            <div class="col-lg-12 mt-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white">
                        <h4 class="mb-0">{{__("Change Password")}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('seller.profile.password.update') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>{{__('Current Password')}}</label>
                                    <input type="password" name="current_password" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>{{__('New Password')}}</label>
                                    <input type="password" name="new_password" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>{{__('Confirm New Password')}}</label>
                                    <input type="password" name="new_password_confirmation" class="form-control">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-success px-4">{{__('Change Password')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
