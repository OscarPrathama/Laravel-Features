@extends('admin.layouts.app')

@section('title')
    {{ $title ?? "Default" }}
@endsection

@section('content')
<div class="container mt-4 mb-5">
    
    {{-- heading --}}
    <div class="row">
        <div class="col-12 div col-md-4 mb-3">
            <h3>Add user</h3>
            <a href="{{ route('admin.users.index') }}" class="text-decoration-none">Back to users</a>
        </div>
    </div>


    <div class="row">
        <div class="col-12 div col-md-4">
            <form action="{{ route('admin.users.store') }}" method="post">
                
                @csrf
                
                {{-- name --}}
                <div class="mb-3">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="John Doe">
                    @error('name')<small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>

                {{-- email --}}
                <div class="mb-3">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="john@gmail.com">
                    @error('email')<small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>

                {{-- dob --}}
                <div class="mb-3">
                    <input type="date" name="dob" value="{{ old('dob') }}" class="form-control @error('dob') is-invalid @enderror">
                    @error('dob')<small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>

                {{-- notes --}}
                <div class="mb-3">
                    <textarea name="notes" class="form-control @error('notes') is-invalid @enderror" cols="30" rows="4" placeholder="message">{{ old('notes') }}</textarea>
                    @error('notes')<small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>

                {{-- password --}}
                <div class="mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="password">
                    @error('password')<small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>

                {{-- password --}}
                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="confirm password">
                    @error('password_confirmation')<small class="invalid-feedback">{{ $message }}</small> @enderror
                </div>

                {{-- submit --}}
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>

</div>
@endsection