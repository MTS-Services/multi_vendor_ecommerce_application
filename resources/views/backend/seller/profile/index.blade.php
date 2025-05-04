@extends('backend.seller.layouts.app', ['page_slug' => 'profile'])

@section('title', 'Seller Profile')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if($seller->image)
                            <img class="profile-user-img img-fluid img-circle"
                                 src="{{ asset('storage/' . $seller->image) }}"
                                 alt="{{ $seller->name }}">
                        @else
                            <img class="profile-user-img img-fluid img-circle"
                                 src="{{ asset('img/default-user.png') }}"
                                 alt="{{ $seller->name }}">
                        @endif
                    </div>

                    <h3 class="profile-username text-center">{{ $seller->name }}</h3>

                    <p class="text-muted text-center">
                        @if($seller->is_verify)
                            <span class="badge badge-success"><i class="fas fa-check-circle"></i> Verified</span>
                        @else
                            <span class="badge badge-warning"><i class="fas fa-exclamation-circle"></i> Unverified</span>
                        @endif
                    </p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Username</b> <a class="float-right">{{ $seller->username ?? 'Not set' }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $seller->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <a class="float-right">{{ $seller->phone ?? 'Not set' }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Status</b>
                            <a class="float-right">
                                @if($seller->status)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </a>
                        </li>
                    </ul>

                    <a href="{{ route('seller.profile.edit') }}" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> Edit Profile</a>
                </div>
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Account Security</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('seller.profile.password') }}" class="btn btn-default btn-block">
                        <i class="fas fa-lock"></i> Change Password
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <h3 class="card-title">Detailed Information</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-user"></i> Personal Details
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-sm-4">Full Name</dt>
                                        <dd class="col-sm-8">{{ $seller->name }}</dd>

                                        <dt class="col-sm-4">Gender</dt>
                                        <dd class="col-sm-8">{{ $seller->gender_text }}</dd>

                                        <dt class="col-sm-4">Father's Name</dt>
                                        <dd class="col-sm-8">{{ $seller->father_name ?? 'Not provided' }}</dd>

                                        <dt class="col-sm-4">Mother's Name</dt>
                                        <dd class="col-sm-8">{{ $seller->mother_name ?? 'Not provided' }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-phone"></i> Contact Information
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-sm-4">Email</dt>
                                        <dd class="col-sm-8">{{ $seller->email }}</dd>

                                        <dt class="col-sm-4">Phone</dt>
                                        <dd class="col-sm-8">{{ $seller->phone ?? 'Not provided' }}</dd>

                                        <dt class="col-sm-4">Emergency Phone</dt>
                                        <dd class="col-sm-8">{{ $seller->emargency_phone ?? 'Not provided' }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-map-marker-alt"></i> Address Information
                            </h3>
                        </div>
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-2">Present Address</dt>
                                <dd class="col-sm-10">{{ $seller->present_address ?? 'Not provided' }}</dd>

                                <dt class="col-sm-2">Permanent Address</dt>
                                <dd class="col-sm-10">{{ $seller->permanent_address ?? 'Not provided' }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
