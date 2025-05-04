@extends('backend.seller.layouts.app', ['page_slug' => 'profile'])

@section('title', 'Edit Profile')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if($seller->image)
                            <img class="profile-user-img img-fluid img-circle preview-image"
                                 src="{{ asset('storage/' . $seller->image) }}"
                                 alt="{{ $seller->name }}">
                        @else
                            <img class="profile-user-img img-fluid img-circle preview-image"
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

                    <a href="{{ route('seller.profile') }}" class="btn btn-default btn-block">
                        <i class="fas fa-arrow-left"></i> Back to Profile
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <h3 class="card-title">Edit Profile Information</h3>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('seller.profile.update') }}" method="POST" enctype="multipart/form-data" id="profile-update-form">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $seller->name) }}" required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $seller->username) }}" minlength="5" maxlength="20">
                                    <small class="text-muted">Between 5-20 characters. Leave empty to keep current username.</small>
                                    @error('username')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $seller->email) }}" required>
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $seller->phone) }}">
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="emargency_phone">Emergency Phone</label>
                                    <input type="text" name="emargency_phone" id="emargency_phone" class="form-control @error('emargency_phone') is-invalid @enderror" value="{{ old('emargency_phone', $seller->emargency_phone) }}">
                                    @error('emargency_phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                        <option value="">-- Select Gender --</option>
                                        <option value="1" {{ old('gender', $seller->gender) == 1 ? 'selected' : '' }}>Male</option>
                                        <option value="2" {{ old('gender', $seller->gender) == 2 ? 'selected' : '' }}>Female</option>
                                        <option value="3" {{ old('gender', $seller->gender) == 3 ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="father_name">Father's Name</label>
                                    <input type="text" name="father_name" id="father_name" class="form-control @error('father_name') is-invalid @enderror" value="{{ old('father_name', $seller->father_name) }}">
                                    @error('father_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mother_name">Mother's Name</label>
                                    <input type="text" name="mother_name" id="mother_name" class="form-control @error('mother_name') is-invalid @enderror" value="{{ old('mother_name', $seller->mother_name) }}">
                                    @error('mother_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">Profile Photo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image" accept="image/jpeg,image/png,image/jpg">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="text-muted">Maximum file size: 2MB. Allowed formats: JPG, JPEG, PNG</small>
                                    @error('image')
                                        <span class="text-danger d-block mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="present_address">Present Address</label>
                                    <textarea name="present_address" id="present_address" class="form-control @error('present_address') is-invalid @enderror" rows="2">{{ old('present_address', $seller->present_address) }}</textarea>
                                    @error('present_address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="permanent_address">Permanent Address</label>
                                    <textarea name="permanent_address" id="permanent_address" class="form-control @error('permanent_address') is-invalid @enderror" rows="2">{{ old('permanent_address', $seller->permanent_address) }}</textarea>
                                    @error('permanent_address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="update-profile-btn">
                                <i class="fas fa-save"></i> Update Profile
                            </button>
                            <a href="{{ route('seller.profile') }}" class="btn btn-default">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize custom file input
    bsCustomFileInput.init();

    // Preview image before upload
    $("#image").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.preview-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });

    // Handle form submission with visual feedback
    $('#profile-update-form').on('submit', function() {
        const submitBtn = $('#update-profile-btn');
        const originalText = submitBtn.html();
        submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Updating...');
        submitBtn.prop('disabled', true);

        // Form will be submitted automatically
        return true;
    });
});
</script>
@endpush
