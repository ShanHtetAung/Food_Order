<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Contracts\Services\User\OrderServiceInterface;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(orderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * user/orderHistory function
     *
     * @return object
     */
    public function orderHistory(): object
    {
        $orders = $this->orderService->orderHistory();

        return view("user.order-history", compact("orders"));
    }

    /**
     * user/orderStatus function
     *
     * @param integer $orderId
     * @return object
     */
    public function orderStatus(int $orderId): object
    {
        $this->orderService->orderStatus($orderId);

        return redirect()->route('orderHistoryPage');
    }
}
