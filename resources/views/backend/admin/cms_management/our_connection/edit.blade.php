@extends('backend.admin.layouts.master', ['page_slug' => 'our_connection'])
@section('title', 'Edit Our Connection')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Edit Our connection') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'cms.our-connection.index',
                        'label' => 'Back',
                        'permissions' => ['our_connection-list'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('cms.our-connection.update', encrypt($our_connection->id)) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $our_connection->name }}" id="name" name="name"
                                class="form-control" placeholder="Enter name">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Description') }} <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" class="form-control" placeholder="Enter description" >{{$our_connection->description }}</textarea>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'description']" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Image') }}</label>
                            <input type="file" accept="image/*" name="uploadImage" data-actualName="image"
                                class="form-control filepond" id="image">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'image']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Website') }}</label>
                            <input type="text" name="website" value="{{ $our_connection->website }}" class="form-control"
                                placeholder="Enter website">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'website']" />
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
    <script src="{{ asset('ckEditor5/main.js') }}"></script>
    {{-- FilePond  --}}
    <script src="{{ asset('filepond/filepond.js') }}"></script>
    <script>
        $(document).ready(function() {
            const existingFiles = {
                "#image": "{{ $our_connection->modified_image }}",
            }
            file_upload(["#image"], "uploadImage", "admin", existingFiles, false);
        });
    </script>
    {{-- FilePond  --}}
@endpush
