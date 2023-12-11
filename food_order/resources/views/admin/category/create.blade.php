@extends('admin.layouts.admin')

@section('title', 'Category Create')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 offset-8">
                <a href="{{ route('food.admin.category.list') }}"><button
                        class="btn bg-dark text-white my-3">List</button></a>
            </div>
        </div>
        <div class="col-lg-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Create your category</h3>
                    </div>
                    <hr>
                    <form action="{{ route('food.admin.category.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="categroyName" class="control-label mb-1">Name</label>
                            <input id="categroyName" name="categoryName" type="text" value="{{ old('categoryName') }}"
                                class="form-control @error('categoryName') is-invalid @enderror" aria-required="true"
                                aria-invalid="false" placeholder="Seafood...">
                            @error('categoryName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div>
                            <button id="" type="submit" class="btn btn-lg btn-info mt-3">
                                <span id="">Create</span>
                                <i class="fa-solid fa-circle-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
