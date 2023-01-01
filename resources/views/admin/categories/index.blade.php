@extends('admin.layouts.app')

@section('title')
    {{ $title ?? "Default" }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h2">Categories Management</h1>
                <div class="border-bottom mt-3"></div>
            </div>
        </div>
    </div>

    <div class="container mt-3 mb-5">
        
        {{-- action --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 mb-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">{{ __('Add new') }}</a>
            </div>
        </div>

        {{-- table --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                @if (session('success'))
                    <div class="text-success mb-1 float-start">{{ session('success') }}</div>
                @endif
                <div class="float-end">
                    
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-12">
                <div class="table-responsive">
                    
                </div>
                <div class="pagination">
                    
                </div>
            </div>
        </div>
        
    </div>
@endsection

@push('script')
    
@endpush