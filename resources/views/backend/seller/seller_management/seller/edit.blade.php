@extends('backend.seller.layouts.app', ['page_slug' => 'seller'])
@section('title', 'Create Seller')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Edit Seller') }}</h4>
                    <x-backend.seller.button :datas="[
                        'routeName' => 'seller.sm.seller.index',
                        'label' => 'Back',
                        'permissions' => ['seller-list'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('seller.sm.seller.update', encrypt($seller->id)) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Country') }} <span class="text-danger">*</span></label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="{{ $seller->country }}" selected hidden>{{ __('Select Country') }}
                                        </option>
                                        @foreach ($countries as $country)
                                            <option
                                                value="{{ $country->id }}"{{ $seller->country_id == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'country']" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('State') }}</label>
                                    <select name="state" id="state" class="form-control" disabled>
                                        <option value="" selected hidden>{{ __('Select State') }}</option>
                                    </select>
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'state']" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('City') }} <span class="text-danger">*</span></label>
                                    <select name="city" id="city" class="form-control" disabled>
                                        <option value="" selected hidden>{{ __('Select City') }}</option>
                                    </select>
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'city']" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Operation Area') }}</label>
                                    <select name="operation_area" id="operation_area" class="form-control" disabled>
                                        <option value="" selected hidden>{{ __('Select Operation Area') }}</option>
                                    </select>
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'operation_area']" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Operation Sub Area') }}</label>
                                    <select name="operation_sub_area" id="operation_sub_area" class="form-control" disabled>
                                        <option value="" selected hidden>{{ __('Select Operation Sub Area') }}
                                        </option>
                                    </select>
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'operation_sub_area']" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('First Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ $seller->first_name }}" name="first_name"
                                        class="form-control" placeholder="Enter first name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'first_name']" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ $seller->last_name }}" name="last_name"
                                        class="form-control" placeholder="Enter last name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'last_name']" />
                                </div>
                            </div>
                            <div class="col-md-6">
                           
                                 <div class="form-group">
                                    <label>{{ __('Hub') }} <span class="text-danger">*</span></label>
                                    <select name="hub" id="hub" class="form-control">
                                        <option value="{{ $seller->hub }}" selected hidden>{{ __('Select hub') }}
                                        </option>
                                        @foreach ($hubs as $hub)
                                            <option
                                                value="{{ $hub->id }}"{{ $seller->hub_id == $hub->id ? 'selected' : '' }}>
                                                {{ $hub->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'hub']" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('Email') }} <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" placeholder="Enter email"
                                    value="{{ $seller->email }}">
                                <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'email']" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Password') }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Enter password">
                                        <x-backend.show-password />
                                    </div>
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'password']" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="Enter confirm password">
                                        <x-backend.show-password />
                                    </div>
                                </div>
                            </div>
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
    <script>
        // Get Country States By Axios
        $(document).ready(function() {
            let route1 = "{{ route('axios.get-states-or-cities') }}";
            $('#country').on('change', function() {
                getStatesOrCity($(this).val(), route1);
            });
            let route2 = "{{ route('axios.get-cities') }}";
            $('#state').on('change', function() {
                getCities($(this).val(), route2);
            });
            let route3 = "{{ route('axios.get-operation-areas') }}";
            $('#city').on('change', function() {
                getOperationAreas($(this).val(), route3);
            });
            let route4 = "{{ route('axios.get-sub-areas') }}";
            $('#operation_area').on('change', function() {
                let route4 = "{{ route('axios.get-sub-areas') }}";
                getOperationSubAreas($(this).val(), route4);
            });

            let data_id = `{{ $seller->state_id ? $seller->state_id : $seller->city_id }}`;
            if (data_id) {
                getStatesOrCity($('#country').val(), route1, data_id);
            }
            if (`{{ $seller->state_id }}`) {
                getCities(`{{ $seller->state_id }}`, route2, `{{ $seller->city_id }}`);
            }
            if (`{{ $seller->city_id }}`) {
                getOperationAreas(`{{ $seller->city_id }}`, route3, `{{ $seller->operation_area_id }}`);
            }
            if (`{{ $seller->operation_area_id }}`) {
                getOperationSubAreas(`{{ $seller->operation_area_id }}`, route4,
                    `{{ $seller->operation_sub_area_id }}`);
            }
        });
    </script>
@endpush
