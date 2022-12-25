@extends('layouts.app')

@section('title')
    {{ $title ?? "Default" }}
@endsection

@section('content')
    <div class="container mt-3 mb-5">
        
        {{-- header --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-10">
                <h3>{{ __('Users management') }}</h3>
            </div>
        </div>
        
        {{-- action --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-10 mb-2">
                <a href="{{ route("users.create") }}" class="btn btn-primary">{{ __('Add new') }}</a>
            </div>
        </div>

        {{-- table --}}
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-10">
                @if (session('success'))
                    <div class="text-success mb-1 float-start">{{ session('success') }}</div>
                @endif
                <div class="float-end">
                    {{ $users->total() }}
                </div>
            </div>
        </div>
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
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->dob }}</td>
                                    <td>{{ $user->notes }}</td>
                                    <td>
                                        <a href="#" class="text-decoration-none me-2">Edit</a>
                                        <a href="#" class="text-decoration-none">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="5">No data</td>
                            </tr>
                        @endif
                        
                    </table>
                </div>
                <div class="pagination">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
        
    </div>
@endsection