<?php

namespace App\Services\Admin;

use App\Contracts\Dao\Admin\OrderDaoInterface;
use App\Contracts\Services\Admin\OrderServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Contracts\Dao\Admin\UserDaoInterface;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;

class OrderService implements OrderServiceInterface
{
    /**
     * @var OrderDaoInterface
     */
    private $orderDao;
    private $userDao;

    /**
     * OrderService constructor
     *
     * @param OrderDaoInterface $orderDao
     */
    public function __construct(OrderDaoInterface $orderDao, UserDaoInterface $userDao)
    {
        $this->orderDao = $orderDao;
        $this->userDao = $userDao;
    }

    /**
     *Order List
     *
     *@return \Illuminate\Database\Eloquent\Collection
     */
    public function list(): Collection
    {
        return $this->orderDao->list();
    }

    /**
     * Summary of getById
     *
     * @param int $orderId
     * @return mixed
     */
    public function getById(int $orderId): mixed
    {
        return $this->orderDao->getById($orderId);
    }

    /**
     * Summary of update
     *
     * @param int $orderId
     * @param array $data
     * @return void
     */
    public function update(int $orderId, array $data): void
    {
        $this->orderDao->update($orderId, $data);
    }

    /**
     * Summary of delete
     *
     * @param int $orderId
     * @return void
     */
    public function delete(int $orderId): void
    {
        $this->orderDao->delete($orderId);
    }

    /**
     * Summary of sendEmail
     *
     * @param int $orderId
     * @return void
     */
    public function sendEmail(int $orderId): void
    {
        $order = $this->orderDao->getById($orderId);
        $users = $this->userDao->list();
        foreach ($users as $user) {
            if ($order->user_id == $user->id) {
                $userEmail = ($user['email']);
                $orderDetails = [
                    'order_code' => $order->order_code,
                    'total_price' => $order->total_price,
                ];
                Mail::to($userEmail)->send(new OrderConfirmation($orderDetails));
            }
        }
    }
    /**
     * getCompletedCountOrders function
     *
     * @return mixed
     */
    public function getCompletedCountOrders(): mixed
    {
        return $this->orderDao->getCompletedCountOrders();
    }

    /**
     * Summary of getOrders
     *
     * @return mixed
     */
    public function getCompletedOrders(): mixed
    {
        return $this->orderDao->getCompletedOrders();
    }

    /**
     * Summary of getCancelledOrders
     *
     * @return mixed
     */
    public function getCancelledOrders(): mixed
    {
        return $this->orderDao->getCancelledOrders();
    }

    /**
     * Summary of getInProgressOrders
     * 
     * @return mixed
     */
    public function getInProgressOrders(): mixed
    {
        return $this->orderDao->getInProgressOrders();
    }
}
