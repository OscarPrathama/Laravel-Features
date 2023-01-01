@extends('layouts.guest')

@section('content')
    <div class="container confirm-password-wrapper my-5 p-3 mb-2">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4 col-lg-5">

                {{-- card --}}
                <div class="card border-success mb-3">
                    <div class="card-header">Info</div>
                    <div class="card-body text-success">
                        <p class="card-text">
                            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                        </p>
                    </div>
                </div>

                {{-- form --}}
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
            
                    <!-- Email Address -->
                    <div class="mb-3">
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Confirm password" required autocomplete="current-password">
                        <div class="invalid-feedback">
                            @error('password') {{ $message }} @enderror
                        </div>
                    </div>

                    {{-- button --}}
                    <div class="d-flex align-items-center content-justify-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Confirm') }}
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
