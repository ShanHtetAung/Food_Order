<?php

namespace App\Contracts\Dao\User;

use App\Http\Requests\ProfileUpdateFormRequest;

interface ProfileDaoInterface
{
    public function update(array $data, int $userId);

    public function changePassword(array $data);
}
