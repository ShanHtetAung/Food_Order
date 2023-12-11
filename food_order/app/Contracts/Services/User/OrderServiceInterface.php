<?php

namespace App\Contracts\Services\User;

interface OrderServiceInterface
{
    public function orderHistory();

    public function orderStatus(int $orderId);
}
