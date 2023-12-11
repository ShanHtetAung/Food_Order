<?php

namespace App\Contracts\Services\User;

use Illuminate\Http\Request;

interface CartServiceInterface
{
    public function countCartList();

    public function getCartList();

    public function deleteCart(int $cartId);

    public function addToCart(Request $request);

    public function orderList(array $data, int $totalPrice);

    public function clearCartList();
}
