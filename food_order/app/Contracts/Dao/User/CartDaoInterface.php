<?php

namespace App\Contracts\Dao\User;

interface CartDaoInterface
{
    public function countCartList();

    public function getCartList();

    public function deleteCart(int $cartId);

    public function addToCart(array $data);

    public function orderList(array $data, int $totalPrice);

    public function clearCartList();
}
