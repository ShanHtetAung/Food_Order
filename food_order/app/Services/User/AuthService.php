<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginFormRequest;
use App\Contracts\Dao\User\AuthDaoInterface;
use App\Http\Requests\UserRegisterFormRequest;
use App\Contracts\Services\User\AuthServiceInterface;

class AuthService implements AuthServiceInterface
{
    /**
     * @var AuthDaoInterface
     */
    private $authDao;

    /**
     * AuthService constructor
     *
     * @param AuthDaoInterface $authDao
     */
    public function __construct(AuthDaoInterface $authDao)
    {
        $this->authDao = $authDao;
    }

    /**
     * Register
     *
     * @param \App\Http\Requests\UserRegisterFormRequest $request
     * @return void
     */
    public function register(UserRegisterFormRequest $request): void
    {
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);

        $this->authDao->create($validatedData);
    }

    /**
     * Login
     *
     * @param \App\Http\Requests\UserLoginFormRequest $request
     * @return mixed
     */
    public function login(UserLoginFormRequest $request): mixed
    {
        // Retrieve the credentials from the request
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect to the index page upon successful login
            return true;
        } else {
            // Redirect back to the login page if authentication fails
            return false;
        }
    }
}
