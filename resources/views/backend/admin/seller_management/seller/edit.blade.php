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
                        'permissions' => ['seller-list'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('sl.seller.update', encrypt($seller->id)) }}" method="POST" enctype="multipart/form-data">
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
