<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AdminFormRequest;
use App\Contracts\Services\Admin\AdminServiceInterface;

class AdminController extends Controller
{
    /**
     * @var AdminServiceInterface
     */
    private $adminService;

    /**
     * AdminController constructor
     *
     * @param AdminServiceInterface $cartService
     */
    public function __construct(AdminServiceInterface $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * Login Page
     *
     * @return \Illuminate\View\View
     */
    public function loginPage(): View
    {
        return view('admin.login');
    }

    /**
     * Login Function
     *
     * @param \App\Http\Requests\AdminFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(AdminFormRequest $request): RedirectResponse
    {
        $loginAdmin = $this->adminService->login($request);

        if ($loginAdmin) {
            return redirect()->route('food.admin.dashboard');
        } else {
            return redirect()->route('food.admin.login')->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }
    }

    /**
     * Logout
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        auth()->guard('admin')->logout();

        return redirect()->route('food.admin.loginPage')->with('message', 'You have been logged out!');
    }
}
