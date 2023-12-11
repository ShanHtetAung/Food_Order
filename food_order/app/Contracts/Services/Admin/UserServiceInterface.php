<?php

namespace App\Contracts\Services\Admin;

interface UserServiceInterface
{
    public function list();

    public function getAllUser();

    public function userCreate(array $data);

    public function userDestroy(int $id);
}
