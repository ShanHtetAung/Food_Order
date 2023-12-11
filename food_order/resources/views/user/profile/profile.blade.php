@extends('user.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="m-auto form-color p-1 rounded-5 shadow-sm bg-light shadow-lg login-bg w-75">
        <div class="row justify-content-center align-items-center my-3">
            <div class="col-12 col-md-7 col-lg-7">
                <p class="h2 text-center mb-3">Update your profile</p>
                <form method="POST" action="{{ route('profile', Auth::user()->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control" name="name"
                            value="{{ old('name', Auth::user()->name) }}" autofocus>
                        @error('name')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if (Auth::user()->image)
                            <img src="{{ Storage::url(Auth::user()->image) }}" alt="{{ Auth::user()->name }}" width="100"
                                height="100">
                        @endif
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" name="email"
                            value="{{ old('email', Auth::user()->email) }}" />
                        @error('email')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="+1234567891 (10 to 15 digits)" pattern="^\+?\d{10,15}$"
                            value="{{ old('phone', Auth::user()->phone) }}" title="Please enter a valid phone (+95)">
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control" rows="3">{{ old('address', Auth::user()->address) }}</textarea>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="d-flex mb-3 justify-content-between">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                        <a href="{{ route('changePasswordPage') }}" class="btn btn-warning">Change Password</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
