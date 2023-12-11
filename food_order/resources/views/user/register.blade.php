@extends('user.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="m-auto form-color p-1 rounded-5 shadow-sm bg-light shadow-lg login-bg w-75">
        <div class="row justify-content-center align-items-center my-3">
            <div class="col-12 col-md-7 col-lg-7">
                <p class="h2 text-center mb-3">Create Account</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}"
                            autofocus>
                        @error('name')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" name="email"
                            value="{{ old('email') }}" />
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
                        <label for="password2" class="form-label">Confirm Password</label>
                        <input type="password" id="password2" class="form-control" name="password_confirmation" />
                        @error('password_confirmation')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="+1234567891 (10 to 15 digits)" pattern="^\+?\d{10,15}$" value="{{ old('phone') }}"
                            title="Please enter a valid phone (+95)">
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control" rows="3">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>

                    <div class="mt-3">
                        <p class="text-center">Already have an account?
                            <a href="{{ route('loginPage') }}" class="btn btn-primary btn-sm">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
