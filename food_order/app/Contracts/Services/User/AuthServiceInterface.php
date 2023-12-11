<?php

namespace App\Contracts\Services\User;

use App\Http\Requests\UserLoginFormRequest;
use App\Http\Requests\UserRegisterFormRequest;

interface AuthServiceInterface
{
    public function register(UserRegisterFormRequest $request);

    public function login(UserLoginFormRequest $request);
}
