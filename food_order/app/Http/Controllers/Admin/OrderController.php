<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Admin\OrderServiceInterface;
use App\Http\Requests\OrderFormRequest;
use App\Imports\OrderImport;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Contracts\Services\Admin\UserServiceInterface;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    /**
     * @var OrderServiceInterface
     */
    private $orderService;

    private $userService;

    /**
     * OrderController constructor
     *
     * @param OrderServiceInterface $orderService
     */
    public function __construct(OrderServiceInterface $orderService, UserServiceInterface $userService)
    {
        $this->orderService = $orderService;
        $this->userService = $userService;
    }

    /**
     * Order List
     *
     * @return \Illuminate\View\View
     */
    public function list(): View
    {
        $orders = $this->orderService->list();
        $users = $this->userService->list();

        return view('admin.order.list', compact('orders', 'users'));
    }

    /**
     * Order Edit
     *
     * @param int $orderId
     * @return \Illuminate\View\View
     */
    public function edit(int $orderId): View
    {
        $order = $this->orderService->getById($orderId);
        $users = $this->userService->list();

        return view('admin.order.edit', compact('order', 'users'));
    }

    /**
     * Summary of orderUpdate
     *
     * @param \App\Http\Requests\OrderFormRequest $request
     * @param int $orderId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OrderFormRequest $request, int $orderId): RedirectResponse
    {
        $this->orderService->update($orderId, $request->all());

        return redirect()->route('food.admin.order.list')->with(['success' => 'Order List Update Successful']);
    }

    /**
     * Summary of orderDelete
     *
     * @param int $orderId
     * @return  @string
     */
    public function delete(int $orderId)
    {
        $this->orderService->delete($orderId);

        return response()->json(['success' => true]);
    }

    /**
     * Summary of orderSendEmail
     *
     * @param int $orderId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendEmail(int $orderId): RedirectResponse
    {
        $this->orderService->sendEmail($orderId);

        return redirect()->route('food.admin.order.list')->with(['success' => 'Order Confirmation Mail has been sent']);
    }

    /**
     * Summary of orderImport
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(): RedirectResponse
    {
        try {
            Excel::import(new OrderImport(), request()->file('file'));

            return redirect()->back()->with('orderSuccess', 'Orders imported successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Summary of orderExport
     *
     * @return mixed
     */
    public function export(): mixed
    {
        return Excel::download(new OrderExport(), 'orders.xlsx');
    }
}
