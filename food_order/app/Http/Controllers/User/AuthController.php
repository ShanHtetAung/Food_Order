<?php

namespace App\Http\Controllers\User;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserLoginFormRequest;
use App\Http\Requests\UserRegisterFormRequest;
use App\Contracts\Services\User\AuthServiceInterface;

class AuthController extends Controller
{
    /**
     * @var AuthServiceInterface
     */
    private $authService;

    /**
     * AuthController constructor
     *
     * @param AuthServiceInterface $authService
     */
    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Register Page
     *
     * @return View
     */
    public function registerPage(): View
    {
        return view('user.register');
    }

    /**
     * Register
     *
     * @param \App\Http\Requests\UserRegisterFormRequest $request
     * @return RedirectResponse
     */
    public function register(UserRegisterFormRequest $request): RedirectResponse
    {
        $this->authService->register($request);

        return redirect()->route('index');
    }

    /**
     * Login Page
     *
     * @return \Illuminate\View\View
     */
    public function loginPage(): View
    {
        return view('user.login');
    }

    /**
     * Login
     *
     * @param \App\Http\Requests\UserLoginFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(UserLoginFormRequest $request): RedirectResponse
    {
        $loginUser = $this->authService->login($request);

        if ($loginUser) {
            return redirect()->route('index');
        } else {
            return redirect()->route('loginPage')->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }
    }

    /**
     * Logout
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('index');
    }
}
