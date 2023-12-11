<?php

namespace App\Dao\User;

use App\Models\User;
use App\Contracts\Dao\User\AuthDaoInterface;

class AuthDao implements AuthDaoInterface
{
    /**
     * Create User
     *
     * @param mixed $validatedData
     * @return void
     */
    public function create($validatedData): void
    {
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address']
        ]);

        auth()->login($user);
    }
}
