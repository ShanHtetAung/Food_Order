<?php

namespace App\Dao\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Contracts\Dao\User\ProfileDaoInterface;

class ProfileDao implements ProfileDaoInterface
{
    /**
     * Profile Update
     *
     * @param mixed $data
     * @param int $userId
     * @return void
     */
    public function update(array $data, int $userId): void
    {
        $user = User::find($userId);

        if ($user->image) {
            $image_path = $user->image;
        }

        if (isset($data['image']) && is_a($data['image'], 'Illuminate\Http\UploadedFile')) {
            if ($user->image) {
                Storage::delete($user->image);
            }
            $image_path = $data['image']->store('public/profile');
            $data['image'] = $image_path;
        }

        $user->update($data);
    }

    /**
     * Change Password
     *
     * @param array $data
     * @return mixed
     */
    public function changePassword(array $data): mixed
    {
        $currentPasswordStatus = Hash::check($data['current_password'], auth()->user()->password);
        if ($currentPasswordStatus) {
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($data['password'])
            ]);

            return true;
        } else {
            return false;
        }
    }
}
