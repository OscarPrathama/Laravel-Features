@extends('layouts.guest')

@section('content')
    <div class="container register-wrapper my-5 p-3 mb-2">
        <div class="row justify-content-center">
            <div class="register-col col-10 col-md-4 col-lg-4">

                {{-- heading --}}
                <h1 class="text-center mb-5">Register</h1>

                {{-- form --}}
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    
                    {{-- name --}}
                    <div class="mb-3">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="john@gmail.com"  autofocus>
                        <div class="invalid-feedback">
                            @error('name') {{ $message }} @enderror
                        </div>
                    </div>

                    {{-- email --}}
                    <div class="mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="john@gmail.com"  autofocus>
                        <div class="invalid-feedback">
                            @error('email') {{ $message }} @enderror
                        </div>
                    </div>

                    {{-- dob --}}
                    <div class="mb-3">
                        <input type="date" name="dob" value="{{ old('dob') }}" class="form-control @error('dob') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('email') {{ $message }} @enderror
                        </div>
                    </div>

                    {{-- password --}}
                    <div class="mb-3">
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="password"  autocomplete="new-password">
                        <div class="invalid-feedback">
                            @error('password') {{ $message }} @enderror
                        </div>
                    </div>

                    {{-- confirm password --}}
                    <div class="mb-3">
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control @error('password') is-invalid @enderror" placeholder="password"  autocomplete="current-password">
                        <div class="invalid-feedback">
                            @error('password_confirmation') {{ $message }} @enderror
                        </div>
                    </div>

                    {{-- others --}}
                    <div class="mb-3">
                        <a class="text-decoration-none" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                    
                    {{-- button --}}
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
@endsection
