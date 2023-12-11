@extends('admin.layouts.admin')

@section('title', 'Order List')

@section('content')
    <table id="order" class="display">
        <thead>
            <tr>
                <th>User Name</th>
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
                        @endif
                    @endforeach
                    <td> {{ $order->order_code }} </td>
                    <td> {{ $order->total_price }} </td>
                    <td> {{ $order->status }} </td>
                    <td> {{ $order->created_at->format('d-m-Y') }} </td>
                    <td>
                        <a href="{{ route('food.admin.order.edit', $order->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="deleteOrder btn btn-danger btn-sm" data-id="{{ $order->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script>
        new DataTable('#order');
    </script>
@endsection
