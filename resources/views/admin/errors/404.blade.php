@extends('admin.layouts.app_error')

@section('title')
    {{ $title ?? "Error" }}
@endsection

@section('content')
    <div class="container my-5">
        <div class="row mt-5">
            <div class="col-12 text-center mt-5">
                <h1>404</h1>
                <p>{{ $message }}</p>
                <a href="{{ url()->previous() }}" class="btn btn-primary">
                    {{ __("Back") }}
                </a>
            </div>
        </div>
    </div>
@endsection