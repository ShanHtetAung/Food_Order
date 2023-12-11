<?php

namespace App\Services\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Dao\User\CartDaoInterface;
use App\Contracts\Services\User\CartServiceInterface;

class CartService implements CartServiceInterface
{
    /**
     * @var CartDaoInterface
     */
    private $cartDao;

    /**
     * CartService constructor
     *
     * @param CartDaoInterface $cartDao
     */
    public function __construct(CartDaoInterface $cartDao)
    {
        $this->cartDao = $cartDao;
    }

    /**
     * countCartList function
     *
     * @return integer
     */
    public function countCartList(): int
    {
        return $this->cartDao->countCartList();
    }

    /**
     * Summary of getCartList
     *
     * @return mixed
     */
    public function getCartList(): mixed
    {
        return $this->cartDao->getCartList();
    }

    /**
     * Summary of deleteCart
     *
     * @param integer $cartId
     * @return void
     */
    public function deleteCart(int $cartId): void
    {
        $this->cartDao->deleteCart($cartId);
    }

    /**
     * Add to Cart function
     * 
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function addToCart(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ];
        $status = $this->cartDao->addToCart($data);

        return $status;
    }

    /**
     * Summary of orderList
     *
     * @param array $data
     * @param integer $totalPrice
     * @return void
     */
    public function orderList(array $data, int $totalPrice): void
    {
        $this->cartDao->orderList($data, $totalPrice);
    }

    /**
     * Summary of clearCartList
     *
     * @return void
     */
    public function clearCartList(): void
    {
        $this->cartDao->clearCartList();
    }
}
