@extends('backend.admin.layouts.master', ['page_slug' => 'lastest_offer'])
@section('title', 'Create Latest Offer')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Create Latest Offer') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'setup.latest-offer.index',
                        'label' => 'Back',
                        'permissions' => ['latest_offer-list'],
                    ]" />



                </div>
                <div class="card-body">
                    <form action="{{ route('setup.latest-offer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Title') }} <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('title') }}" id="title" name="title"
                                class="form-control" placeholder="Enter title">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'title']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Url') }}</label>
                            <input type="url" value="{{ old('url') }}" id="url" name="url"
                                class="form-control" placeholder="Enter Url">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'url']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Description') }} <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter description">{{ old('description') }}</textarea>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'description']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Image') }}</label>
                            <input type="file" name="uploadImage" data-actualName="image" class="form-control filepond"
                                id="image" accept="image/*">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'image']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Value') }} <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('value') }}" id="value" name="value"
                                class="form-control" placeholder="Enter value">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'value']" />
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
    <script src="{{ asset('ckEditor5/main.js') }}"></script>
    <script src="{{ asset('filepond/filepond.js') }}"></script>
    <script>
        $(document).ready(function() {
            file_upload(["#image"], "uploadImage", "admin", [], false);
        });
    </script>
    {{-- FilePond  --}}
@endpush
