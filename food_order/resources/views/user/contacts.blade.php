@extends('user.layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="m-auto form-color p-1 rounded-5 shadow-sm bg-light shadow-lg login-bg w-75">
        <div class="row justify-content-center align-items-center my-3">
            <div class="col-12 col-md-7 col-lg-7">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <p class="h2 text-center mb-3">ContactUs</p>
                <form method="POST" action="{{ route('contactus') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" disabled
                            value="{{ Auth()->user()->name }}" autofocus>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" disabled
                            value="{{ Auth()->user()->email }}">
                    </div>

                    <div class="mb-3">
                        <label>Subject</label>
                        <input type="text" value="{{ old('subject') }}"
                            class="form-control @error('subject') is-invalid @enderror" name="subject">
                        @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Message</label>
                        <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="3">{{ old('message') }}</textarea>
                        @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
