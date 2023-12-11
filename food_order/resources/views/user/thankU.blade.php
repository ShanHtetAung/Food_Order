@extends('user.layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="container text-center py-5 shadow-lg my-5">
        <!-- Logo -->
        <img src="{{ asset('assets/images/logo.png') }}" alt="food order" class="img-fluid mb-4" style="max-height: 100px;">

        <!-- Thank You Heading -->
        <h2 class="text-danger">Thank You for Your Order!</h2>

        <!-- Shop More Button -->
        <a href="{{ route('index') }}" class="btn btn-primary mt-3">Order Again</a>
    </div>
@endsection
