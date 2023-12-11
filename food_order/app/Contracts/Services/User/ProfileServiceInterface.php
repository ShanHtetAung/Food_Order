<?php

namespace App\Contracts\Services\User;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateFormRequest;

interface ProfileServiceInterface
{
    public function update(ProfileUpdateFormRequest $request, int $userId);

    public function changePassword(Request $request);
}
