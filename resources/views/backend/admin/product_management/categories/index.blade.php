@extends('backend.admin.layouts.master', ['page_slug' => 'admin'])
@section('title', 'Admin List')
@push('css')
    <link rel="stylesheet" href="{{ asset('custom_litebox/litebox.css') }}">
@endpush
@section('content')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Categories</h1>
    <a href="{{ route('pm.category.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New
    </a>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="text-center">
                                @if($category->image)
                                    <img src="{{ storage_url($category->image) }}" alt="{{ $category->name }}" width="50" class="img-thumbnail">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <span class="badge {{ $category->status_color }}">
                                    {{ $category->status_label }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge {{ $category->featured_color }}">
                                    {{ $category->featured_label }}
                                </span>
                            </td>
                            <td>{{ optional($category->createdBy)->name ?? 'System' }}</td>
                            <td>{{ timeFormat($category->created_at) }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('pm.category.show', $category) }}" class="btn btn-sm btn-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('pm.category.edit', encrypt($category->id)) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" title="Delete"
                                        onclick="if(confirm('Are you sure?')) { document.getElementById('delete-form-{{ encrypt($category->id) }}').submit(); }">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ encrypt($category->id) }}" method="POST"
                                          action="{{ route('pm.category.destroy', $category) }}" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No categories found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
