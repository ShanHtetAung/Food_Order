<?php

namespace App\Http\Controllers\User;

use App\Models\OrderItem;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\User\CartServiceInterface;

class CartController extends Controller
{
    /**
     * @var CartServiceInterface
     */
    private $cartService;

    /**
     * CartController constructor
     *
     * @param CartServiceInterface $cartService
     */
    public function __construct(CartServiceInterface $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Summary of list
     *
     * @return \Illuminate\View\View
     */
    public function list(): View
    {
        $cartLists = $this->cartService->getCartList();

        return view('user.cart.list', compact('cartLists'));
    }

    /**
     * Summary of orderDelete
     *
     * @param int $cartId
     * @return  @string
     */
    public function delete(int $cartId)
    {
        $this->cartService->deleteCart($cartId);
        return response()->json(['success' => true]);
    }

    /**
     * Summary of orderList
     *
     * @return  @string
     */
    public function orderList(Request $request)
    {
        foreach ($request->all() as $item) {
            $totalPrice = 0;
            $data = [];
            for ($i = 0; $i < count($item); $i++) {
                $data = OrderItem::create(
                    [
                        'product_id' => $item[$i]['product_id'],
                        'quantity' => $item[$i]['quantity'],
                        'price' => $item[$i]['price'],
                        'order_code' => $item[$i]['order_code'],
                    ]
                );
                $totalPrice += $data['price'];
            }
        }
        $data = $data->toArray();
        $this->cartService->orderList($data, $totalPrice);
        $this->cartService->clearCartList();

        return response()->json(['success' => true]);
    }

    /**
     * Summary of cartListClear
     * 
     * @return  @string
     */
    public function cartListClear()
    {
        $this->cartService->clearCartList();
        return response()->json(['success' => true]);
    }
}
