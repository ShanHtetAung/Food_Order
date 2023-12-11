<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminFormRequest;
use App\Contracts\Dao\Admin\AdminDaoInterface;
use App\Contracts\Services\Admin\AdminServiceInterface;

class AdminService implements AdminServiceInterface
{
    /**
     * @var AdminDaoInterface
     */
    private $adminDao;

    /**
     * AdminService constructor
     *
     * @param AdminDaoInterface $adminDao
     */
    public function __construct(AdminDaoInterface $adminDao)
    {
        $this->adminDao = $adminDao;
    }

    /**
     * Login Function
     *
     * @param \App\Http\Requests\AdminFormRequest $request
     * @return mixed
     */
    public function login(AdminFormRequest $request): mixed
    {
        // Retrieve the credentials from the request
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the admin
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect to the admin dashboard upon successful login
            return true;
        } else {
            // Redirect back to the login page if authentication fails
            return false;
        }
    }
}
