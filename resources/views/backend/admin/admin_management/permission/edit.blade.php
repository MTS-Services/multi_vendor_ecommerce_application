@extends('backend.admin.layouts.master', ['page_slug' => 'permission'])
@section('title', 'Edit Permission')
@section('content')
    <div class="row px-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">{{ __('Edit Permission') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'am.permission.index',
                        'label' => 'Back',
                        'permissions' => ['permission-list', 'permission-details', 'permission-delete'],
                    ]" />
                </div>
                <form method="POST" action="{{ route('am.permission.update', encrypt($permission->id)) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter permission name"
                                value="{{ $permission->name }}">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Prefix') }}</label>
                            <input type="text" name="prefix" class="form-control" placeholder="Enter permission prefix"
                                value="{{ $permission->prefix }}">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'prefix']" />
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
