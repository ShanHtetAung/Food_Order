<?php

namespace App\Services\Admin;

use App\Contracts\Dao\Admin\UserDaoInterface;
use App\Contracts\Services\Admin\UserServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class UserService implements UserServiceInterface
{
    /**
     * @var UserDaoInterface
     */
    private $userDao;

    /**
     * UserService constructor
     *
     * @param UserDaoInterface $userDao
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     *User List
     *
     *@return \Illuminate\Database\Eloquent\Collection
     */
    public function list(): Collection
    {
        return $this->userDao->list();
    }
    /**
     * Admin/getAllUser function
     *
     * @return object
     */
    public function getAllUser(): object
    {
        return $this->userDao->getAllUser();
    }

    /**
     * Admin/userCreate function
     *
     * @param array $data
     * @return object
     */
    public function userCreate(array $data): object
    {
        return $this->userDao->userCreate($data);
    }

    /**
     * Admin/userDestroy function
     *
     * @param integer $id
     * @return boolean
     */
    public function userDestroy(int $id): bool
    {
        return $this->userDao->userDestroy($id);
    }
}
