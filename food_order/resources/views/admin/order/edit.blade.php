@extends('admin.layouts.admin')

@section('title', 'Order Edit')

@section('content')
    <div class="container">
        <div class="card mt-5">
            <h4 class="card-header font-weight-bold">
                Order Edit
            </h4>
            <div class="card-body">
                <form action="{{ route('food.admin.order.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name">Order Code</label>
                        <input type="text" class="form-control text-black-50" name="order_code" id="order_code"
                            placeholder="Enter OrderCode"
                            value="{{ isset($order) ? old('order_code', $order->order_code) : old('order_code') }}"
                            readonly>
                        @error('order_code')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="user">User</label>
                        <select name="user_id" class="form-select text-black-50" disabled>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ old('user_id', $order->user_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        <!-- Hidden input to submit the user ID -->
                        <input type="hidden" name="user_id" value="{{ $order->user_id }}">
                        @error('user_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone">Total Price</label>
                        <input type="text" class="form-control text-black-50" name="total_price" id="total_price"
                            placeholder="Enter Total Price"
                            value="{{ isset($order) ? old('total_price', $order->total_price) : old('total_price') }}"
                            readonly>
                        @error('total_price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" class="form-select">
                            <option value="Completed" @selected($order->status == 'Completed')>Completed</option>
                            <option value="In Progress" @selected($order->status == 'In Progress')>In Progress</option>
                            <option value="Cancelled" @selected($order->status == 'Cancelled')>Cancelled</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('food.admin.order.list') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
