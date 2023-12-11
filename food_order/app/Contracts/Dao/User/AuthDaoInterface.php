<?php

namespace App\Contracts\Dao\User;

interface AuthDaoInterface
{
    public function create($validatedData);
}
