@extends('backend.admin.layouts.master', ['page_slug' => 'seller'])
@section('title', 'Create Seller')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Edit Seller') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'sl.seller.index',
                        'label' => 'Back',
                        'permissions' => ['seller-list', 'seller-details', 'seller-delete', 'seller-status'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('sl.seller.update', encrypt($seller->id)) }}" id="updateForm') }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $seller->name }}" name="name" class="form-control"
                                placeholder="Enter name">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Username') }}</label>
                            <input type="text" value="{{ $seller->username }}" name="username" class="form-control"
                                placeholder="Enter username">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'username']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Gender') }}<span class="text-danger">*</span></label>
                            <select name="gender" value={{ $seller->gender }} class="form-control">
                                <option value="" selected hidden>{{__('Select Gender')}}</option>
                                @foreach (\App\Models\Seller::getGenderLabels() as $key => $value)
                                    <option value="{{ $key }}" {{ old('gender') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'gender']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Image') }}</label>
                            <input type="file" name="uploadImage" value="{{ $seller->image }}" data-actualName="image" class="form-control filepond"
                                id="image" accept="image/*">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'image']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Email') }} <span class="text-danger">*</span></label>
                            <input type="text" name="email" value="{{ $seller->email }}" class="form-control" placeholder="Enter email">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'email']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Password') }} <span class="text-danger">*</span></label>
                            <input type="password" name="password" value="{{ $seller->password }}" class="form-control" placeholder="Enter password">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'password']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" value="{{ $seller->password }}" class="form-control"
                                placeholder="Enter confirm password">
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
            const existingFiles = {
                "#image":"{{ auth_storage_url($seller->image) }}",
            };
            file_upload(["#image"], "uploadImage", "admin", existingFiles, false);
        });
    </script>
    {{-- FilePond  --}}
@endpush
