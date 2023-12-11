@extends('user.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="m-auto form-color p-1 rounded-5 shadow-sm bg-light shadow-lg login-bg w-75">
        <div class="row justify-content-center align-items-center my-3">
            <div class="col-12 col-md-7 col-lg-7">
                <p class="h2 text-center mb-3">Login to your account</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}"
                            autofocus />
                        @error('email')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" name="password" />
                        @error('password')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>

                    <div class="mt-3">
                        <p class="text-center">Don't have an account?
                            <a href="{{ route('registerPage') }}" class="btn btn-primary btn-sm">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
