@extends('backend.hub.layouts.master', ['page_slug' => 'staff'])
@section('title', 'Edit Staff')
@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header d-flex w-full justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Edit Staff') }}</h4>
                
                      <x-backend.hub.button :datas="[ 
                        'routeName' => 'sm.staff.index',
                        'label' => 'Back',
                    ]" />
                   </div>
                <div class="card-body">
                    <form action="{{ route('sm.staff.update', encrypt($staff->id)) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group pt-3">
                                    <label>{{ __('First Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('first_name', $staff->first_name) }}" name="first_name"
                                        class="form-control" placeholder="Enter first name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'first_name']" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pt-3">
                                    <label>{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('last_name', $staff->last_name) }}" name="last_name"
                                        class="form-control" placeholder="Enter last name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'last_name']" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group pt-3">
                                    <label>{{ __('Username') }}</label>
                                    <input type="text" value="{{ old('username', $staff->username) }}" name="username"
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
                                                {{ old('hub_id', $staff->hub_id) == $hub->id ? 'selected' : '' }}>
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
                            <input type="text" name="email" value="{{ old('email', $staff->email) }}" class="form-control" placeholder="Enter email">
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
                "#image": "{{ $staff->modified_image }}",
            }
            file_upload(["#image"], "uploadImage", "staff", existingFiles, false);

            // username validation
            const username = $('.username');
            const error = $('.username-error');
            validateUsername(username, error);
        });
    </script>
    {{-- FilePond  --}}
@endpush
