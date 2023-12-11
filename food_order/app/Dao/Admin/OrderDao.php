<?php

namespace App\Dao\Admin;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use App\Contracts\Dao\Admin\OrderDaoInterface;

class OrderDao implements OrderDaoInterface
{

    /**
     *Order List
     *
     *@return \Illuminate\Database\Eloquent\Collection
     */
    public function list(): Collection
    {
        return Order::orderBy("created_at", "asc")->get();
    }

    /**
     * Summary of getById
     * @param int $orderId
     * @return mixed
     */
    public function getById(int $orderId): mixed
    {
        return Order::findOrFail($orderId);
    }

    /**
     * Summary of update
     * @param int $orderId
     * @param array $data
     * @return void
     */
    public function update(int $orderId, array $data): void
    {
        $order = Order::find($orderId);
        $order->update($data);
    }

    /**
     * Summary of delete
     * @param int $orderId
     * @return void
     */
    public function delete(int $orderId): void
    {
        Order::destroy($orderId);
    }

    /**
     * getCompletedCountOrders function
     *
     * @return mixed
     */
    public function getCompletedCountOrders(): mixed
    {
        return  Order::where('status', 'Completed')->get();
    }

    /**
     * Summary of getOrders
     *
     * @return mixed
     */
    public function getCompletedOrders(): mixed
    {
        return Order::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('status', 'Completed')
            ->groupBy('date')
            ->get();
    }

    /**
     * Summary of getCancelledOrders
     *
     * @return mixed
     */
    public function getCancelledOrders(): mixed
    {
        return Order::where('status', 'Cancelled')->get();
    }

    /**
     * Summary of getInProgressOrders
     * 
     * @return mixed
     */
    public function getInProgressOrders(): mixed
    {
        return Order::where('status', 'In Progress')->get();
    }
}
