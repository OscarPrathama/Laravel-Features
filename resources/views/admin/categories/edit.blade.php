@extends('admin.layouts.app')

@section('title')
    {{ $title ?? "Edit category" }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h2">Edit Category</h1>
                <div class="border-bottom mt-3"></div>
            </div>
        </div>
    </div>

    <div class="container mt-3 mb-5">

        {{-- form --}}
        <div class="row">
            <div class="col-12 col-md-5">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h4>Category form</h4>

                    {{-- category image --}}
                    <div class="mb-3">
                        <div class="mb-3">
                            <img src="{{ !empty($category->image) ? Storage::url($category->image) : '' }}" alt="" class="w-75">
                        </div>
                        <input 
                            type="file" 
                            name="category_image" 
                            class="form-control @error('category_image') is-invalid @enderror" 
                            id="categoryImage" 
                            value="{{ old('category_image') }}">
                        @error('category_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- category name --}}
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category name</label>
                        <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="categoryName" value="{{ $category->name ?? old('category_name') }}">
                        @error('category_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- category description --}}
                    <div class="mb-3">
                        <label for="categoryDescription" class="form-label">Category description</label>
                        <textarea name="category_description" class="form-control @error('category_description') is-invalid @enderror" id="categoryDescription" rows="5">{{ $category->description ?? old('category_description') }}</textarea>
                        @error('category_description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('Update category') }}</button>
                    </div>

                </form>
            </div>
        </div>
        
    </div>
@endsection

@push('script')
    
@endpush