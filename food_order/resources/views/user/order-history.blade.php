@extends('user.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="my-5">
        <table id="order_history" class="display table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Order_Code</th>
                    <th>Total_Price</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $serialNumber = 1;
                @endphp

                @foreach ($orders as $order)
                    @if (auth()->user()->id == $order->user_id)
                        <tr>
                            <td>{{ $serialNumber++ }}</td>
                            <td>{{ $order->order_code }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                @if ($order->status == 'In Progress')
                                    <form action="{{ route('orderStatus', $order->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Cancel</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        //Datatable
        $(document).ready(() => {
            $('#order_history').DataTable({
                "scrollX": "100%"
            });
        });
    </script>
@endsection
