@extends('layouts.guest')

@section('content')
    <div class="container forgot-password-wrapper my-5 p-3 mb-2">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4 col-lg-5">

                {{-- card --}}
                <div class="card border-success mb-3">
                    <div class="card-header">Info</div>
                    <div class="card-body text-success">
                        <p class="card-text">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </p>
                    </div>
                </div>

                {{-- status --}}
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- form --}}
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
            
                    <!-- Email Address -->
                    <div class="mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="john@gmail.com" required autofocus>
                        <div class="invalid-feedback">
                            @error('email') {{ $message }} @enderror
                        </div>
                    </div>

                    {{-- button --}}
                    <div class="d-flex align-items-center content-justify-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
