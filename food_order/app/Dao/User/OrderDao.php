<?php

namespace App\Dao\User;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\User\OrderDaoInterface;


class OrderDao implements OrderDaoInterface
{
    public function orderHistory()
    {
        return DB::table('orders')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.*', 'users.id as userId', 'users.name')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function orderStatus($orderId)
    {
        $order = Order::find($orderId);
        $order->status = 'Cancelled'; // Replace 'new-status' with the desired status

        $order->save();
    }
}
