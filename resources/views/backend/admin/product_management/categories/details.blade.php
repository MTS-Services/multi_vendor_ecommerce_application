@extends('backend.admin.layouts.master', ['page_slug' => 'pm'])

@section('title', 'Category Details')

@push('css')
    <link rel="stylesheet" href="{{ asset('custom_litebox/litebox.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">{{ __('Category Details') }}</h4>
                    <a href="{{ route('pm.category.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left"></i> {{ __('Back to List') }}
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <td>{{ $category->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Slug') }}</th>
                                <td>{{ $category->slug }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Description') }}</th>
                                <td>{{ $category->description ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Image') }}</th>
                                <td>
                                    @if ($category->image)
                                        <img src="{{ asset($category->image) }}" alt="Image" width="120" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Status') }}</th>
                                <td>
                                    <span class="badge badge-{{ $category->status ? 'success' : 'danger' }}">
                                        {{ $category->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Featured') }}</th>
                                <td>
                                    <span class="badge badge-{{ $category->is_featured ? 'primary' : 'secondary' }}">
                                        {{ $category->is_featured ? 'Featured' : 'Not Featured' }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Sort Order') }}</th>
                                <td>{{ $category->sort_order }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Meta Title') }}</th>
                                <td>{{ $category->meta_title ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Meta Description') }}</th>
                                <td>{{ $category->meta_description ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Created By') }}</th>
                                <td>{{ $category->createdBy->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Created Date') }}</th>
                                <td>{{ $category->created_at->format('d M Y, h:i A') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('custom_litebox/litebox.js') }}"></script>
@endpush
