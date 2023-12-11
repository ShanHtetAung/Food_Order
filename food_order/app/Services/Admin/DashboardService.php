<?php

namespace App\Services\Admin;

use App\Contracts\Dao\Admin\DashboardDaoInterface;
use App\Contracts\Services\Admin\DashboardServiceInterface;

class DashboardService implements DashboardServiceInterface
{
    /**
     * @var DashboardDaoInterface
     */
    private $dashboardDao;

    /**
     * DashboardService constructor
     *
     * @param DashboardDaoInterface $dashboardDao
     */
    public function __construct(DashboardDaoInterface $dashboardDao)
    {
        $this->dashboardDao = $dashboardDao;
    }
}
