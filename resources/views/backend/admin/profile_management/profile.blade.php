@extends('backend.admin.layouts.master', ['page_slug' => 'admin_profile'])

@section('title', 'Admin Profile')

@push('css')
    <style>
        .card {
            border-radius: 10px;
        }

        .form-control {
            border-radius: 6px;
            box-shadow: none;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .btn {
            border-radius: 6px;
        }

        .text-danger {
            font-size: 0.875rem;
        }

        .btn-item {
            background: linear-gradient(to right, #8a41d8, #a201ffcb);
            color: white;
            border: 1px solid transparent;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 500;
            transition: all 0.3s ease-in-out;
        }

        .nav-item:hover {
            opacity: 0.8;
            cursor: pointer
        }

        .active.nav-item {
            background: linear-gradient(to right, #DC2626, #a201ffcb);
        }

        .card-header {
            background: linear-gradient(to right, #8a41d8, #a201ffcb);
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-around align-items-center gap-5 py-5 text-center">
                    <p class="btn-item w-100 py-2 active" data-bs-target="profile">profile</p>
                    <p class="btn-item w-100 py-2" data-bs-target="address">Address</p>
                    <p class="btn-item w-100 py-2" data-bs-target="change-password">Change Password</p>
                </div>
            </div>
        </div>

        
    </div>
@endsection
@push('js-links')
    {{-- FilePond  --}}
    <script src="{{ asset('ckEditor5/main.js') }}"></script>
    <script src="{{ asset('filepond/filepond.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Handle click on nav items
            $('.nav-item').on('click', function() {
                // Remove 'active' from all nav items
                $('.nav-item').removeClass('active');

                // Add 'active' to the clicked nav item
                $(this).addClass('active');

                // Get the target tab ID from data-bs-target attribute
                const target = $(this).data('bs-target');

                // Hide all tab panes
                $('.tab-pane').removeClass('active');

                // Show the target tab pane
                $('#' + target).addClass('active');
            });
        });
        // Get Country States By Axios
        $(document).ready(function() {
            let route1 = "{{ route('setup.axios.get-states-or-cities') }}";
            $('#country').on('change', function() {
                getStatesOrCity($(this).val(), route1);
            });
            let route2 = "{{ route('setup.axios.get-cities') }}";
            $('#state').on('change', function() {
                getCities($(this).val(), route2);
            });
            let route3 = "{{ route('setup.axios.get-operation-areas') }}";
            $('#city').on('change', function() {
                getOperationAreas($(this).val(), route3);
            });

            let data_id =
                `{{ $address->state_id ? $address->state_id : $address->city_id }}`;
            getStatesOrCity($('#country').val(), route1, data_id);
            if (`{{ $address->state_id }}`) {
                getCities(`{{ $address->state_id }}`, route2, `{{ $address->city_id }}`);
            }
            getOperationAreas(`{{ $address->city_id }}`, route3,
                `{{ $address->operation_area_id }}`);
        });
    </script>
    {{-- FilePond  --}}
@endpush