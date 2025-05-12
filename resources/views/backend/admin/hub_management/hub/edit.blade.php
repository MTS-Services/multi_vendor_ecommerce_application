@extends('backend.admin.layouts.master', ['page_slug' => 'hub'])
@section('title', 'Edit Hub')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Edit Hub') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'hm.hub.index',
                        'label' => 'Back',
                        'permissions' => ['hub-list'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('hm.hub.update', encrypt($hub->id)) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Country') }} <span class="text-danger">*</span></label>
                            <select name="country" id="country" class="form-control">
                                <option value="{{$hub->country }}" selected hidden>{{__('Select Country')}}</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}"{{ $hub->country_id == $country->id ? 'selected' : ''}}>{{ $country->name }}</option>
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
                            <input type="text" value="{{$hub->name }}" id="title" name="name" class="form-control"
                                placeholder="Enter name">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Slug') }}<span class="text-danger">*</span></label>
                            <input type="text" value="{{$hub->slug}}" id="slug" name="slug" class="form-control"
                                placeholder="Enter slug">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'slug']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Adderss') }}<span class="text-danger">*</span></label>
                            <input type="text" value="{{$hub->address}}" id="address" name="address" class="form-control"
                                placeholder="Enter address">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'address']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Meta Title') }}</label>
                            <input type="text" value="{{$hub->meta_title }}" id="meta_title" name="meta_title" class="form-control"
                                placeholder="Enter meta title">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'meta_title']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Meta description') }}</label>
                            <textarea type="text"  id="meta_description" name="meta_description" class="form-control"
                                placeholder="Enter meta_description">{{$hub->meta_description}}</textarea>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'meta_description']" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Description') }}</label>
                            <textarea type="text" name="description" class="form-control" placeholder="description">{{ $hub->description }}</textarea>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'description']" />
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

    <script>
         // Get Country States By Axios
         $(document).ready(function() {
            let route1 = "{{ route('axios.get-states-or-cities') }}";
            $('#country').on('change', function () {
                getStatesOrCity($(this).val(), route1);
            });
            let route2 = "{{ route('axios.get-cities') }}";
            $('#state').on('change', function () {
                getCities($(this).val(), route2);
            });
            let route3 ="{{ route('axios.get-operation-areas') }}";
            $('#city').on('change', function () {
                getOperationAreas($(this).val(), route3);
            });


            let data_id = `{{ $hub->state_id ? $hub->state_id : $hub->city_id }}`;
            getStatesOrCity($('#country').val(), route1, data_id);
            if(`{{$hub->state_id}}`){
                getCities(`{{$hub->state_id}}`, route2, `{{ $hub->city_id }}`);
            }
            getOperationAreas(`{{ $hub->city_id }}`, route3, `{{ $hub->operation_area_id }}`);
        });
    </script>
@endpush
