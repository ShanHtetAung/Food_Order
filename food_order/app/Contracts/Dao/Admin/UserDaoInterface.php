<?php

namespace App\Contracts\Dao\Admin;

interface UserDaoInterface
{
    public function list();

    public function getAllUser();

    public function userCreate(array $data);

    public function userDestroy(int $id);
}
