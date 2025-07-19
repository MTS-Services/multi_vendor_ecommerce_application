@extends('backend.seller.layouts.app', ['page_slug' => 'seller'])
@section('title', 'Create Seller')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Create Seller') }}</h4>
                    <x-backend.seller.button :datas="[
                        'routeName' => 'seller.sm.seller.index',
                        'label' => 'Back',
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('seller.sm.seller.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label>{{ __('Email') }} <span class="text-danger">*</span></label>
                            <input type="text" name="email" class="form-control" placeholder="Enter email"
                                value="{{ old('email') }}">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'email']" />
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
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
                                <div class="form-group">
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
