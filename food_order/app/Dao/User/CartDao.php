<?php

namespace App\Dao\User;

use App\Models\Cart;
use App\Contracts\Dao\User\CartDaoInterface;
use App\Models\Order;

class CartDao implements CartDaoInterface
{
    /**
     * countCartList function
     *
     * @return integer
     */
    public function countCartList(): int
    {
        if (!empty(auth()->user()->id)) {
            return Cart::where("user_id", auth()->user()->id)->count();
        } else {
            return 0;
        }
    }

    /**
     * Summary of getCartList
     *
     * @return mixed
     */
    public function getCartList(): mixed
    {
        return Cart::select('carts.*', 'products.name as product_name', 'products.price as product_price', 'products.image as product_image')
            ->leftJoin('products', 'products.id', 'carts.product_id')
            ->where('carts.user_id', auth()->user()->id)
            ->get();
    }

    /**
     * Summary of deleteCart
     *
     * @param int $cartId
     * @return void
     */
    public function deleteCart(int $cartId): void
    {
        Cart::destroy($cartId);
    }

    /**
     * Add to cart if the product does not exist
     *
     * @param array $data
     * @return bool
     */
    public function addToCart(array $data)
    {
        if (Cart::where('user_id', auth()->user()->id)->where('product_id', $data['product_id'])->exists()) {
            return false;
        } else {
            Cart::create($data);

            return true;
        }
    }

    /**
     * Summary of orderList
     *
     * @return void
     */
    public function orderList(array $data, int $totalPrice)
    {
        Order::create([
            'user_id' => auth()->user()->id,
            'order_code' => $data['order_code'],
            'total_price' => $totalPrice,
        ]);
    }

    /**
     * Summary of clearCartList
     *
     * @return void
     */
    public function clearCartList()
    {
        Cart::where('user_id', auth()->user()->id)->delete();
    }
}
