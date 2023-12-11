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
        <div class="row">
            <div class="col-lg-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Edit your product</h3>
                        </div>
                        <hr>
                        <form action="{{ route('food.admin.product.update', $product->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-4 offset-1">
                                    <img src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="img-thumbnail shadow-sm" />
                                    <div class="mt-3">
                                        <input type="file" name="image"
                                            class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- submit button --}}
                                    <div class="mt-3">
                                        <button type="submit" class="btn bg-dark text-white col-12"><i
                                                class="fa-solid fa-file-arrow-up me-2"></i>Update</button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    @include('admin.product.common_form', [
                                        'status' => 'update',
                                        'categories' => $category,
                                    ])
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
