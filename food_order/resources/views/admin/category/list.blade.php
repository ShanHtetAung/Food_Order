@extends('admin.layouts.admin')

@section('title', 'Category')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h2>Category List</h2>
                </div>
                <div class="col-md-2 offset-4">
                    <a href="{{ route('food.admin.category.create') }}" class="btn btn-primary">Create</a>
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
                <table id="category" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr id="tr_{{ $category->id }}">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at->format('j-F-Y') }}</td>
                                <td>
                                    <a href="{{ route('food.admin.category.edit', $category->id) }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="javascript:void(0)" class="btn btn-danger"
                                        onclick="deleteCategory({{ $category->id }})">Delete</a>
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
        new DataTable('#category');

        function deleteCategory(id) {
            if (confirm("Are you sure to delete this?")) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: '{{ route('food.admin.category.delete', ['categoryId' => '__id__']) }}'.replace('__id__',
                        id),
                    type: 'DELETE',
                    success: function(result) {
                        $('#' + result['tr']).slideUp("slow");

                        $('#category').DataTable().row("#" + result['tr']).remove().draw(false);
                    }
                })
            }
        }
    </script>
@endsection
