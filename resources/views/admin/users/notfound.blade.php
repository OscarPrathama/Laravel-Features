@extends('admin.layouts.app')

@section('title')
    {{ $title ?? "User not found" }}
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <h3>{{ $message }}</h3>
            </div>
        </div>
    </div>
@endsection