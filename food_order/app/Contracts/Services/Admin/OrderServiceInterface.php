<?php

namespace App\Contracts\Services\Admin;

interface OrderServiceInterface
{

    public function list();

    public function getById(int $orderId);

    public function update(int $orderId, array $data);

    public function delete(int $orderId);

    public function sendEmail(int $orderId);

    public function getCompletedCountOrders();

    public function getCompletedOrders();

    public function getCancelledOrders();

    public function getInProgressOrders();
}
