<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Admin\DashboardServiceInterface;
use App\Contracts\Services\Admin\UserServiceInterface;
use App\Contracts\Services\Admin\OrderServiceInterface;

class DashboardController extends Controller
{
    /**
     * @var DashboardServiceInterface
     */
    private $dashboardService;

    private $orderService;

    private $userService;

    /**
     * DashboardController constructor
     *
     * @param DashboardServiceInterface $dashboardService
     */
    public function __construct(DashboardServiceInterface $dashboardService, OrderServiceInterface $orderService, UserServiceInterface $userService)
    {
        $this->dashboardService = $dashboardService;
        $this->orderService = $orderService;
        $this->userService = $userService;
    }

    /**
     * Dashboard
     *
     *@return \Illuminate\View\View
     */
    public function index(): View
    {
        $ordersCompletedCount = $this->orderService->getCompletedCountOrders();
        $ordersCompleted = $this->orderService->getCompletedOrders();
        $ordersCancelled = $this->orderService->getCancelledOrders();
        $ordersInProgress = $this->orderService->getInProgressOrders();
        $users = $this->userService->list();

        return view('admin.dashboard', compact('ordersCompletedCount', 'ordersCompleted', 'ordersCancelled', 'ordersInProgress', 'users',));
    }
}
