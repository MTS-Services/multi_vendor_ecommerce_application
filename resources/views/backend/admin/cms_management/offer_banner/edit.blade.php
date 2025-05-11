@extends('backend.admin.layouts.master', ['page_slug' => 'offer_banner'])
@section('title', 'Edit Offer Banner')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Edit Offer Banner') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'cms.offer-banner.index',
                        'label' => 'Back',
                        'permissions' => ['offer_banner-list'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('cms.offer-banner.update', encrypt($offer_banners->id)) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Title') }}  <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $offer_banners->title }}" id="title" name="title" class="form-control"
                                placeholder="Enter title">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'title']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Sub Title') }}  <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $offer_banners->subtitle }}" name="subtitle" id="subtitle" class="form-control"
                                placeholder="Enter title">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'subtitle']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Image') }}</label>
                            <input type="file" accept="image/*" name="uploadImage" data-actualName="image"
                                class="form-control filepond" id="image">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'image']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Url') }}</label>
                            <input type="text" name="url" value="{{ $offer_banners->url }}" class="form-control" placeholder="Enter url">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'url']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Start Date') }}</label>
                            <input type="date" name="start_date" value="{{ $offer_banners->start_date}}" class="form-control" placeholder="Enter date">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'start_date']" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('End Date') }}</label>
                            <input type="date" name="end_date" value="{{$offer_banners->end_date}}" class="form-control" placeholder="Enter date">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'end_date']" />
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
                "#image":"{{ $offer_banners->modified_image }}",
            }
            file_upload(["#image"], "uploadImage", "admin", existingFiles, false);
        });
    </script>
    {{-- FilePond  --}}
@endpush
