<?php

namespace App\Services\User;

use Illuminate\Http\Request;
use App\Contracts\Dao\User\ProfileDaoInterface;
use App\Http\Requests\ProfileUpdateFormRequest;
use App\Contracts\Services\User\ProfileServiceInterface;

class ProfileService implements ProfileServiceInterface
{
    /**
     * @var ProfileDaoInterface
     */
    private $profileDao;

    /**
     * ProfileService constructor
     *
     * @param ProfileDaoInterface $profileDao
     */
    public function __construct(ProfileDaoInterface $profileDao)
    {
        $this->profileDao = $profileDao;
    }

    /**
     * Profile Update
     *
     * @param \App\Http\Requests\ProfileUpdateFormRequest $request
     * @param int $userId
     * @return void
     */
    public function update(ProfileUpdateFormRequest $request, int $userId): void
    {
        $data = $request->validated();

        $this->profileDao->update($data, $userId);
    }

    /**
     * ChangePassword
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function changePassword(Request $request): mixed
    {
        $data = $request->validate([
            'current_password' => ['required', 'string', 'min:6', 'max:100'],
            'password' => ['required', 'string', 'min:6', 'confirmed', 'max:100']
        ]);

        return $this->profileDao->changePassword($data);
    }
}
