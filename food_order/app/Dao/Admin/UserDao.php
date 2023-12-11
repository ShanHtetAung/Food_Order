<?php

namespace App\Dao\Admin;

use App\Models\User;
use App\Contracts\Dao\Admin\UserDaoInterface;
use Illuminate\Database\Eloquent\Collection;

class UserDao implements UserDaoInterface
{
    /**
     *User List
     *
     *@return \Illuminate\Database\Eloquent\Collection
     */
    public function list(): Collection
    {
        return User::orderBy("created_at", "asc")->get();
    }

    /*
     * Admin/getAllUser function
     *
     * @return object
     */
    public function getAllUser(): object
    {
        return User::all();
    }

    /**
     * Admin/userCreate function
     *
     * @param array $data
     * @return object
     */
    public function userCreate(array $data): object
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);
    }

    /**
     * Admin/userDestroy function
     *
     * @param integer $id
     * @return boolean
     */
    public function userDestroy(int $id): bool
    {
        return User::destroy($id);
    }
}
