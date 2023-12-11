@extends('admin.layouts.admin')

@section('title', 'User')

@section('content')
    {{-- alert message start --}}
    <div class="row">
        <div class="col">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    {{-- alert message end --}}

    {{-- user crate button start --}}
    <div class="row">
        <div class="col-md-6">
            <h2>User List</h2>
        </div>
        <div class="col-md-2 offset-4">
            <a class="btn btn-primary float-end mt-3 mb-3" href="{{ route('food.admin.user.create') }}">Create</a>
        </div>
    </div>
    {{-- user crate button end --}}

    <table id="user" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Register Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr id="tr_{{ $user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-danger"
                            onclick="deleteUser({{ $user->id }})">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script>
        new DataTable('#user');
    </script>
    <script src="{{ asset('assets/js/admin/user_delete.js') }}"></script>
@endsection
