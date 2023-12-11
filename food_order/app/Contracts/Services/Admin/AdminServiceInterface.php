<?php

namespace App\Contracts\Services\Admin;

use App\Http\Requests\AdminFormRequest;

interface AdminServiceInterface
{
    public function login(AdminFormRequest $request);
}
