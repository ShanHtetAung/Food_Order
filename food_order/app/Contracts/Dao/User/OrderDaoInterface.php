<?php

namespace App\Contracts\Dao\User;

interface OrderDaoInterface
{
    public function orderHistory();

    public function orderStatus(int $orderId);
}
