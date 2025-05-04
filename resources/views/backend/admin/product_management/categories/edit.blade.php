@extends('backend.admin.layouts.master', ['page_slug' => 'pm'])

@section('title', 'Edit Category')

@push('css')
    <link rel="stylesheet" href="{{ asset('custom_litebox/litebox.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('pm.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">{{ __('Edit Category') }}</h4>
                        <a href="{{ route('pm.category.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{ __('Category Name') }} <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $category->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea name="description" id="description"
                                      class="form-control @error('description') is-invalid @enderror"
                                      rows="4">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if ($category->image)
                            <div class="form-group">
                                <label>{{ __('Current Image') }}</label><br>
                                <img src="{{ asset($category->image) }}" alt="Category Image" class="img-thumbnail" width="120">
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="image">{{ __('Change Image') }}</label>
                            <input type="file" name="image" id="image"
                                   class="form-control-file @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                            <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror" required>
                                <option value="1" {{ $category->status ? 'selected' : '' }}>{{ __('Active') }}</option>
                                <option value="0" {{ !$category->status ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="is_featured">{{ __('Featured') }}</label>
                            <select name="is_featured" id="is_featured"
                                    class="form-control @error('is_featured') is-invalid @enderror">
                                <option value="0" {{ !$category->is_featured ? 'selected' : '' }}>{{ __('Not Featured') }}</option>
                                <option value="1" {{ $category->is_featured ? 'selected' : '' }}>{{ __('Featured') }}</option>
                            </select>
                            @error('is_featured')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="hidden" name="sort_order" value="{{ $category->sort_order ?? 0 }}">

                        <div class="form-group">
                            <label for="meta_title">{{ __('Meta Title') }}</label>
                            <input type="text" name="meta_title" id="meta_title"
                                   class="form-control @error('meta_title') is-invalid @enderror"
                                   value="{{ old('meta_title', $category->meta_title) }}">
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="meta_description">{{ __('Meta Description') }}</label>
                            <textarea name="meta_description" id="meta_description"
                                      class="form-control @error('meta_description') is-invalid @enderror"
                                      rows="3">{{ old('meta_description', $category->meta_description) }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('custom_litebox/litebox.js') }}"></script>
@endpush
