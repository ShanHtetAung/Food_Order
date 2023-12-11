@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 offset-9">
                <a href="{{ route('food.admin.product.list') }}">
                    <button class="btn bg-dark text-white my-3">List</button>
                </a>
            </div>
        </div>
        <div class="col-lg-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Create your Product</h3>
                    </div>
                    <hr>
                    <form action="{{ route('food.admin.product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('admin.product.common_form', [
                            'status' => 'create',
                            'categories' => $categories,
                        ])
                        <div class="form-group">
                            <label for="image" class="control-label mb-1">Image</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-lg btn-info mt-3">
                                <span>Create</span>
                                <i class="fa-solid fa-circle-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
