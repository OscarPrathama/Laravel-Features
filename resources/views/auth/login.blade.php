@extends('layouts.guest')

@section('content')
    <div class="container login-wrapper my-5 p-3 mb-2">
        <div class="row justify-content-center">
            <div class="login-col col-10 col-md-4 col-lg-4">

                {{-- heading --}}
                <h1 class="text-center mb-5">Login</h1>

                {{-- session --}}
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- form --}}
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    {{-- email --}}
                    <div class="mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="john@gmail.com"  autofocus>
                        <div class="invalid-feedback">
                            @error('email') {{ $message }} @enderror
                        </div>
                    </div>

                    {{-- password --}}
                    <div class="mb-3">
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="password"  autocomplete="current-password">
                        <div class="invalid-feedback">
                            @error('password') {{ $message }} @enderror
                        </div>
                    </div>

                    <div class="d-md-flex justify-content-between my-4">

                        {{-- remember me --}}
                        <div class="d-block d-md-inline">
                            <label for="remember_me">
                            <input type="checkbox" id="remember_me" class="form-check-input" name="remember">
                                <small class="">{{ __('Remember me') }}</small>
                            </label>
                        </div>

                        {{-- password request --}}
                        <div>
                            @if (Route::has('password.request'))
                                <div class="d-block d-md-inline password-request">
                                    <a href="{{ route('password.request') }}" class="text-decoration-none">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    

                    {{-- button --}}
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
@endsection
