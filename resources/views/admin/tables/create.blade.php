@extends('admin.layouts.app')

@section('title')
    {{ $title ?? "Default" }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h2">Add Table</h1>
                <div class="border-bottom mt-3"></div>
            </div>
        </div>
    </div>

    <div class="container mt-3 mb-5">

        {{-- form --}}
        <div class="row">
            <div class="col-12 col-md-5">
                <form action="{{ route('admin.tables.store') }}" method="POST">
                    @csrf

                    <h4>Table form</h4>

                    

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('Add new table') }}</button>
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