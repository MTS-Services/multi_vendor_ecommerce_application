@extends('backend.admin.layouts.master', ['page_slug' => 'operation_sub_area'])
@section('title', 'Edit Operation Sub Area')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Edit Operation Sub Area') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'setup.operation-sub-area.index',
                        'label' => 'Back',
                        'permissions' => ['operation-sub-area-list'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('setup.operation-sub-area.update', encrypt($operation_sub_area->id)) }}') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>{{ __('Country') }} <span class="text-danger">*</span></label>
                            <select name="country" id="country" class="form-control">
                                <option value="" selected hidden>{{__('Select Country')}}</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}" {{ $operation_sub_area->country_id == $country->id ? 'selected' : ''}}>{{ $country->name }}</option>
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
                            <label>{{ __('Operation Area') }} <span class="text-danger">*</span></label>
                            <select name="operation_area" id="operation_area" class="form-control" disabled>
                                <option value="" selected hidden>{{__('Select Operation Area')}}</option>
                            </select>
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'operation_area']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $operation_sub_area->name }}" id="title" name="name" class="form-control"
                                placeholder="Enter name">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Slug') }}<span class="text-danger">*</span></label>
                            <input type="text" value="{{ $operation_sub_area->slug }}" id="slug" name="slug" class="form-control"
                                placeholder="Enter slug">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'slug']" />
                        </div>

                        <div class="form-group">
                            <label>{{ __('Description') }}</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Description">{{ $operation_sub_area->description }}</textarea>
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


            let data_id = `{{ $operation_sub_area->state_id ? $operation_sub_area->state_id : $operation_sub_area->city_id }}`;
            if(data_id){
                getStatesOrCity($('#country').val(), route1, data_id);
            }
            if(`{{$operation_sub_area->state_id}}`){
                getCities(`{{$operation_sub_area->state_id}}`, route2, `{{ $operation_sub_area->city_id }}`);
            }
            if(`{{ $operation_sub_area->city_id }}`){
                getOperationAreas(`{{ $operation_sub_area->city_id }}`, route3, `{{ $operation_sub_area->operation_area_id }}`);
            }
        });
    </script>
@endpush
