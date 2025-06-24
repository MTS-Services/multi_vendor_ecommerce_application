@extends('backend.admin.layouts.master', ['page_slug' => 'seller'])
@section('title', 'Create Seller')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="cart-title">{{ __('Create Seller') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'sl.seller.index',
                        'label' => 'Back',
                        'permissions' => ['seller-list'],
                    ]" />
                </div>
                <div class="card-body">
                    <form action="{{ route('sl.seller.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Country') }} <span class="text-danger">*</span></label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="" selected hidden>{{ __('Select Country') }}</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ old('country') == $country->id ? 'selected' : '' }}>{{ $country->name }}
                                            </option>
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
                                    <input type="text" value="{{ old('first_name') }}" name="first_name"
                                        class="form-control" placeholder="Enter first name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'first_name']" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('last_name') }}" name="last_name"
                                        class="form-control" placeholder="Enter last name">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'last_name']" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Email') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter email"
                                        value="{{ old('email') }}">
                                    <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'email']" />
                                </div>
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
                            <input type="submit" class="btn btn-primary" value="Create">
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
            $('#country').on('change', function() {
                let route1 = "{{ route('axios.get-states-or-cities') }}";
                getStatesOrCity($(this).val(), route1);
            });
            $('#state').on('change', function() {
                let route2 = "{{ route('axios.get-cities') }}";
                getCities($(this).val(), route2);
            });
            $('#city').on('change', function() {
                let route3 = "{{ route('axios.get-operation-areas') }}";
                getOperationAreas($(this).val(), route3);
            });
            $('#operation_area').on('change', function() {
                let route4 = "{{ route('axios.get-sub-areas') }}";
                getOperationSubAreas($(this).val(), route4);
            });


        });
    </script>
    @endpush
