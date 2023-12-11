@extends('admin.layouts.admin')

@section('title', 'Product')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h2>Product list</h2>
                </div>
                <div class="col-md-2 offset-4">
                    <a href="{{ route('food.admin.product.create') }}" class="btn btn-primary">Create</a>
                </div>
            </div>

            {{-- message session --}}
            @if (session('createSuccess'))
                <div class="col-4 offset-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-check"></i> {{ session('createSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('updateSuccess'))
                <div class="col-4 offset-8">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-check"></i> {{ session('updateSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <div class="row">
                <table id="product" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr id="tr_{{ $product->id }}">
                                <td>{{ $product->id }}</td>
                                <td class="col-2"><img src="{{ asset('storage/product/' . $product->image) }}"
                                        alt="{{ $product->image }}" class="img-thumbnail shadow-sm"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>
                                    <a href="{{ route('food.admin.product.edit', $product->id) }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="javascript:void(0)" class="btn btn-danger"
                                        onclick="deleteProduct({{ $product->id }})">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        new DataTable('#product');

        function deleteProduct(id) {
            if (confirm("Are you sure to delete?")) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: '{{ route('food.admin.product.delete', ['productId' => '__id__']) }}'.replace('__id__',
                        id),
                    type: 'DELETE',
                    success: function(result) {
                        $('#' + result['tr']).slideUp("slow");

                        $('#product').DataTable().row("#" + result['tr']).remove().draw(false);
                    }
                })
            }
        }
    </script>
@endsection
