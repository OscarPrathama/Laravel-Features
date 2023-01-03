@extends('admin.layouts.app')

@section('title')
    {{ $title ?? 'Dashboard' }}
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="h2">Dashboard</h1>
            <div class="border-bottom mt-3"></div>
        </div>
    </div>
</div>

@endsection