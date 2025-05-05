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
                                <div class="form-group">
                                    <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('name', $seller->name) }}" name="name"
                                        class="form-control" placeholder="Enter name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Email') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('email', $seller->email) }}" name="email"
                                        class="form-control" placeholder="Enter name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'email']" />
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Username') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('username', $seller->username) }}" name="username"
                                        class="form-control" placeholder="Enter name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'username']" />
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Profile Image') }}</label>
                                    <input type="file" name="uploadImage" data-actualName="image"
                                        class="form-control filepond" id="image" accept="image/*">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'image']" />
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Gender') }} <span class="text-danger">*</span></label>
                                    <select name="gender" class="form-control">
                                        @foreach ($seller->getGenderLabels() as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('gender') == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'gender']" />
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Emergency Phone') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('emergency_phone', $seller->emergency_phone) }}"
                                        name="emergency_phone" class="form-control" placeholder="Enter Emergency phone">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'emergency_phone']" />
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Phone') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('phone', $seller->phone) }}" name="phone"
                                        class="form-control" placeholder="Enter phone">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'phone']" />
                                </div>
                                <div class="form-group">
                                    <label>{{ __("Father's Name") }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('father_name', $seller->father_name) }}"
                                        name="father_name" class="form-control" placeholder="Enter Fathers name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'father_name']" />
                                </div>
                                <div>
                                    <label>{{ __("Mother's Name") }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('mother_name', $seller->mother_name) }}"
                                        name="mother_name" class="form-control" placeholder="Enter Fathers name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'mother_name']" />
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Present Address') }} <span class="text-danger">*</span></label>
                                    <textarea name="present_address" class="form-control" placeholder="Enter present_address">{{ old('present_address') }}</textarea>
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'present_address']" />
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Permanent Address') }} <span class="text-danger">*</span></label>
                                    <textarea name="permanent_address" class="form-control" placeholder="Enter permanent_address">{{ old('permanent_address') }}</textarea>
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'permanent_address']" />
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
                                <div>
                                    <label>{{ __('Current Password') }} <span class="text-danger">*</span></label>
                                    <input type="password"
                                        name="current_password" class="form-control">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'current_password']" />
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
@push('js-links')
    {{-- FilePond  --}}
    <script src="{{ asset('ckEditor5/main.js') }}"></script>
    <script src="{{ asset('filepond/filepond.js') }}"></script>
    <script>
        $(document).ready(function() {
            const existingFiles = {
                "#image": "{{ auth_storage_url($seller->image, $seller->gender) }}",
            }
            file_upload(["#image"], "uploadImage", "seller", existingFiles, false);
        });
    </script>
    {{-- FilePond  --}}
@endpush
