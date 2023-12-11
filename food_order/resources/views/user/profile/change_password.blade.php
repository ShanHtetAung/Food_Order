@extends('user.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="m-auto form-color p-1 rounded-5 shadow-sm bg-light shadow-lg login-bg w-75">
        <div class="row justify-content-center align-items-center my-3">
            <div class="col-12 col-md-7 col-lg-7">
                <div class="row mt-1 text-center">
                    @if (session('info'))
                        <div class="alert alert-info alert-dismissible fade show mb-2 w-75 m-auto" role="alert">
                            <i class="fa-sharp fa-solid fa-bolt"></i> {{ session('info') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <p class="h2 text-center mb-3">Change Password</p>
                <form action="{{ route('changePassword') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Current Password</label>
                        <input autofocus type="password" name="current_password" class="form-control" />
                        @error('current_password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>New Password</label>
                        <input type="password" name="password" class="form-control" />
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" />
                        @error('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{ route('profilePage') }}" class="btn btn-danger">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
