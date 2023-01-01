@extends('admin.layouts.app')

@section('title')
    {{ $title ?? "Default" }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h2">Add Category</h1>
                <div class="border-bottom mt-3"></div>
            </div>
        </div>
    </div>

    <div class="container mt-3 mb-5">

        {{-- form --}}
        <div class="row">
            <div class="col-12 col-md-5">
                <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h4>Category form</h4>

                    {{-- category image --}}
                    <div class="mb-3">
                        <label for="categoryImage" class="form-label">Category image</label>
                        <input type="file" name="category_image" class="form-control" id="categoryImage">
                    </div>

                    {{-- category name --}}
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category name</label>
                        <input type="text" name="category_name" class="form-control" id="categoryName">
                    </div>

                    {{-- category description --}}
                    <div class="mb-3">
                        <label for="categoryDescription" class="form-label">Category description</label>
                        <textarea name="category_description" class="form-control" id="categoryDescription" rows="5"></textarea>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('Add new category') }}</button>
                    </div>

                </form>
            </div>
            <div class="col-12 offset-md-1 col-md-6">
                <h4>Categories</h4>
            </div>
        </div>
        
    </div>
@endsection

@push('script')
    
@endpush