@extends('layouts.app')

@section('title')
    {{ $title ?? "Default" }}
@endsection

@section('content')
    <div class="container mt-4 mb-5">
        
        {{-- header --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-10">
                <h3>Users management</h3>
            </div>
        </div>
        
        {{-- action --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-10 mb-3">
                <a href="{{ route("users.create") }}" class="btn btn-primary">Add new</a>
            </div>
        </div>

        {{-- table --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-10">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Date of Birth</td>
                            <td>Notes</td>
                            <td>Action</td>
                        </tr>
                        @if ($users != [])
                            <tr>
                                <td>ada</td>
                                <td>ada</td>
                                <td>ada</td>
                                <td>ada</td>
                                <td>ada</td>
                            </tr>
                        @else
                            <tr class="text-center">
                                <td colspan="5">No data</td>
                            </tr>
                        @endif
                        
                    </table>
                </div>
            </div>
        </div>
        
    </div>
@endsection