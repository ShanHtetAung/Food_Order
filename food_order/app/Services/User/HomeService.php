<?php

namespace App\Services\User;

use App\Contracts\Dao\User\HomeDaoInterface;
use App\Contracts\Services\User\HomeServiceInterface;

class HomeService implements HomeServiceInterface
{
    /**
     * @var HomeDaoInterface
     */
    private $homeDao;

    /**
     * HomeService constructor
     *
     * @param HomeDaoInterface $homeDao
     */
    public function __construct(HomeDaoInterface $homeDao)
    {
        $this->homeDao = $homeDao;
    }
}
