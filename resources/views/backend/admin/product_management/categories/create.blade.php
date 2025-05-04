@extends('backend.admin.layouts.master', ['page_slug' => 'admin'])
@section('title', 'Admin List')
@push('css')
    <link rel="stylesheet" href="{{ asset('custom_litebox/litebox.css') }}">
@endpush
@section('content')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Add New Category</h1>
    <a href="{{ route('pm.category.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to List
    </a>
</div>

<form action="{{ route('pm.category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="card shadow-sm">
        <div class="card-body row g-4">

            {{-- Name --}}
            <div class="col-md-6">
                <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Parent Category --}}
            <div class="col-md-6">
                <label for="parent_id" class="form-label">Parent Category</label>
                <select name="parent_id" id="parent_id" class="form-select @error('parent_id') is-invalid @enderror">
                    <option value="">-- None (Top Level) --</option>
                    @foreach($categories as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                            {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
                @error('parent_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Slug --}}
            <div class="col-md-6">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                       value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Sort Order --}}
            <div class="col-md-6">
                <label for="sort_order" class="form-label">Sort Order</label>
                <input type="number" name="sort_order" id="sort_order" class="form-control @error('sort_order') is-invalid @enderror"
                       value="{{ old('sort_order', 0) }}">
                @error('sort_order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Status --}}
            <div class="col-md-6">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Featured --}}
            <div class="col-md-6">
                <label for="is_featured" class="form-label">Featured</label>
                <select name="is_featured" id="is_featured" class="form-select @error('is_featured') is-invalid @enderror">
                    <option value="1" {{ old('is_featured') == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="2" {{ old('is_featured', 2) == 2 ? 'selected' : '' }}>No</option>
                </select>
                @error('is_featured')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Image --}}
            <div class="col-md-6">
                <label for="image" class="form-label">Category Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>

            {{-- Meta Title --}}
            <div class="col-md-6">
                <label for="meta_title" class="form-label">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ old('meta_title') }}">
            </div>

            {{-- Meta Description --}}
            <div class="col-md-6">
                <label for="meta_description" class="form-label">Meta Description</label>
                <input type="text" name="meta_description" id="meta_description" class="form-control" value="{{ old('meta_description') }}">
            </div>
        </div>

        <div class="card-footer text-end">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Save Category
            </button>
        </div>
    </div>
</form>
@endsection
