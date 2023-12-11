<?php

namespace App\Services\User;

use App\Contracts\Services\User\OrderServiceInterface;
use App\Contracts\Dao\User\OrderDaoInterface;

class OrderService implements OrderServiceInterface
{
    private $orderDao;

    public function __construct(OrderDaoInterface $orderDao)
    {
        $this->orderDao = $orderDao;
    }

    public function orderHistory()
    {
        return $this->orderDao->orderHistory();
    }

    public function orderStatus(int $orderId)
    {
        return $this->orderDao->orderStatus($orderId);
    }
}
