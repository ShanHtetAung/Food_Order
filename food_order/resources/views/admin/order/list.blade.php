@extends('admin.layouts.admin')

@section('title', 'Order List')

@section('content')
    <div class="container mb-5 mt-4">
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-2 m-auto" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('orderSuccess'))
            <div class="alert alert-success alert-dismissible fade show mb-2 m-auto" role="alert">
                {{ session('orderSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-5 offset-1">
                <form action="{{ route('food.admin.order.import') }}" method="POST" enctype="multipart/form-data"
                    id="importForm">
                    <div class="d-flex justify-content-start">
                        <div>
                            @csrf
                            <input class="form-control" type="file" name="file" id="fileInput">
                        </div>
                        <div class="ms-2">
                            <button class="btn btn-primary" type="submit" id="importButton" disabled>Import Data</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-3 offset-3">
                <a href="{{ route('food.admin.order.export') }}" class="btn btn-primary">Export Data</a>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class=" mt-3">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="text-center">{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    <table id="order" class="display">
        <thead>
            <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>Order Code</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Order Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="ordersList">
            @foreach ($orders as $order)
                <tr>
                    @foreach ($users as $user)
                        @if ($order->user_id == $user->id)
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }} </td>
                        @endif
                    @endforeach
                    <td> {{ $order->order_code }} </td>
                    <td> {{ $order->total_price }} </td>
                    <td> {{ $order->status }} </td>
                    <td> {{ $order->created_at->format('d-m-Y') }} </td>
                    <td>
                        <a href=" {{ route('food.admin.order.sendEmail', $order->id) }} "
                            class="btn btn-success btn-sm">Send Mail</a>
                        <a href="{{ route('food.admin.order.edit', $order->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="deleteOrder btn btn-danger btn-sm" data-id="{{ $order->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script src="{{ asset('assets/js/admin/order_delete.js') }}"></script>
    <script>
        document.getElementById('fileInput').addEventListener('change', function() {
            var importButton = document.getElementById('importButton');
            importButton.disabled = this.value === ''; // Disable the button if no file is selected
        });
    </script>
    <script>
        new DataTable('#order');
    </script>
@endsection
