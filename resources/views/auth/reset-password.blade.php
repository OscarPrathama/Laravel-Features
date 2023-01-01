@extends('layouts.guest')

@section('content')
    <div class="container my-5 p-3 mb-2">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4 col-lg-4">

                {{-- form --}}
                <form action="{{ route('password.store') }}" method="POST">
                    @csrf
                    
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    {{-- email --}}
                    <div class="mb-3">
                        <input type="email" name="email" value="{{ old('email', $request->email) }}" class="form-control @error('email') is-invalid @enderror" placeholder="john@gmail.com" required autofocus>
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

                    {{-- button --}}
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
@endsection
