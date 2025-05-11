@extends('backend.admin.layouts.master', ['page_slug' => 'hub'])
@section('title', 'Create Hub')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Create Hub') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'hm.hub.index',
                        'label' => 'Back',
                        'permissions' => ['hub-list'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('hm.hub.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Country') }} <span class="text-danger">*</span></label>
                            <select name="country" id="country" class="form-control">
                                <option value="" selected hidden>{{__('Select Country')}}</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}" {{ old('country') == $country->id ? 'selected' : ''}}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'country']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('State') }}</label>
                            <select name="state" id="state" class="form-control" disabled>
                                <option value="" selected hidden>{{__('Select State')}}</option>
                            </select>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'state']" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('City') }} <span class="text-danger">*</span></label>
                            <select name="city" id="city" class="form-control" disabled>
                                <option value="" selected hidden>{{__('Select City')}}</option>
                            </select>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'city']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Operation Area') }}</label>
                            <select name="operation_area" id="operation_area" class="form-control" disabled>
                                <option value="" selected hidden>{{__('Select Operation Area')}}</option>
                            </select>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'operation_area']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('name') }}" id="title" name="name" class="form-control"
                                placeholder="Enter name">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Slug') }}<span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('slug') }}" id="slug" name="slug" class="form-control"
                                placeholder="Enter slug">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'slug']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Adderss') }}<span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('address') }}" id="address" name="address" class="form-control"
                                placeholder="Enter address">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'address']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Meta Title') }}<span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('meta_title') }}" id="meta_title" name="meta_title" class="form-control"
                                placeholder="Enter meta title">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'meta_title']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Meta description') }}<span class="text-danger">*</span></label>
                            <textarea type="text" value="{{ old('meta_description') }}" id="meta_description" name="meta_description" class="form-control"
                                placeholder="Enter meta_description"></textarea>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'meta_description']" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Description') }}</label>
                            <textarea type="text" name="description" class="form-control" placeholder="description">{{ old('description') }}</textarea>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'description']" />
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
    <script src="{{ asset('ckEditor5/main.js') }}"></script>

    <script>
         // Get Country States By Axios
        $(document).ready(function() {
            $('#country').on('change', function () {
                let route1 = "{{ route('axios.get-cities') }}";
                getStatesOrCity($(this).val(), route1);
            });
            $('#state').on('change', function () {
                let route2 = "{{ route('axios.get-states-or-cities') }}";
                getCities($(this).val(), route2);
            });
            $('#city').on('change', function () {
                let route3 ="{{ route('axios.get-operation-areas') }}";
                getOperationAreas($(this).val(), route3);
            });
        });
    </script>
@endpush
