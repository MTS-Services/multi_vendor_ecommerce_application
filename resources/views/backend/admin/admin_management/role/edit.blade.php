@extends('backend.admin.layouts.master', ['page_slug' => 'role'])
@section('title', 'Edit Role')
@push('css')
    <style>
        .groupName {
            background: #cdcdcd;
            border-bottom: 2px solid #182456;
            font-weight: bold;
            text-transform: uppercase;
        }

        .groupName label {
            color: #000;
            font-size: 15px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .list-items li {
            list-style: none;
            background: #cdcdcd;
            border-bottom: 2px solid #182456;
        }

        .list-items li label {
            color: #000;
            font-weight: bold;
            text-transform: capitalize;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">{{ __('Edit Role') }}</h4>
                    <x-backend.admin.button :datas="[
                        'routeName' => 'am.role.index',
                        'label' => 'Back',
                        'permissions' => ['role-list', 'role-delete', 'role-details'],
                    ]" />
                </div>
                <form method="POST" action="{{ route('am.role.update', encrypt($role->id)) }}" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group px-0">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                value="{{ $role->name }}">
                            <x-feed-back-alert :datas="['errors' => $errors, 'field' => 'name']" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($groupedPermissions->chunk(1) as $chunks)
                                        <div class="col-md-3">
                                            @foreach ($chunks as $prefix => $permissions)
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3 class="m-0 pl-4 groupName">
                                                            <input type="checkbox" class="m-2 prefix-checkbox"
                                                                id="prefix-checkbox-{{ $prefix }}"
                                                                data-prefix="{{ $prefix }}">
                                                            <label
                                                                for="prefix-checkbox-{{ $prefix }}">{{ $prefix }}</label>
                                                        </h3>
                                                        <ul class="list-items p-0">
                                                            @foreach ($permissions as $permission)
                                                                <li class="ps-4">
                                                                    <input type="checkbox" name="permissions[]"
                                                                        id="permission-checkbox-{{ $permission->id }}"
                                                                        value="{{ $permission->id }}"
                                                                        class="m-2 permission-checkbox"
                                                                        @if ($role->hasPermissionTo($permission->name)) @checked(true) @endif>
                                                                    <label
                                                                        for="permission-checkbox-{{ $permission->id }}">{{ slugToTitle($permission->name) }}</label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.prefix-checkbox').each(function() {
                var allBox = $(this).closest('h3').next('ul').find('.permission-checkbox');
                var allChecked = allBox.length === allBox.filter(':checked').length;
                $(this).prop('checked', allChecked);
            });
            $('.prefix-checkbox').on('click', function() {
                var prefix = $(this).data('prefix');
                var permissionCheckboxes = $(this).closest('h3').next('ul').find('.permission-checkbox');
                var isChecked = $(this).prop('checked');

                permissionCheckboxes.prop('checked', isChecked);

            });


            $('.permission-checkbox').on('click', function() {
                var checkboxId = $(this).attr('id');
                var prefix = $(this).closest('ul').prev('h3').find('.prefix-checkbox');
                var permissionCheckboxes = $(this).closest('ul').find('.permission-checkbox');
                var isAllChecked = permissionCheckboxes.length === permissionCheckboxes.filter(':checked')
                    .length;

                prefix.prop('checked', isAllChecked);
            });

            // Handle click event on text elements
            $('label[for^="permission-checkbox-"]').on('click', function() {
                var checkboxId = $(this).attr('for');
                $('#' + checkboxId).prop('checked'); // Trigger the associated checkbox click event
            });
            $('label[for^="permission-checkbox-"]').on('click', function() {
                var checkboxId = $(this).attr('for');
                $('#' + checkboxId).prop('checked'); // Trigger the associated checkbox click event
            });
        });
    </script>
@endpush
