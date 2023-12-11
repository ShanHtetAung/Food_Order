<?php

namespace App\Http\Controllers\User;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProfileUpdateFormRequest;
use App\Contracts\Services\User\ProfileServiceInterface;

class ProfileController extends Controller
{
    /**
     * @var ProfileServiceInterface
     */
    private $profileService;

    /**
     * ProfileController constructor
     *
     * @param ProfileServiceInterface $profileService
     */
    public function __construct(ProfileServiceInterface $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * Profile Page
     *
     * @return \Illuminate\View\View
     */
    public function profilePage(): View
    {
        return view('user.profile.profile');
    }

    /**
     * Profile Update
     *
     * @param \App\Http\Requests\ProfileUpdateFormRequest $request
     * @param int $userId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profileUpdate(ProfileUpdateFormRequest $request, int $userId): RedirectResponse
    {
        $this->profileService->update($request, $userId);

        return redirect()->route('index');
    }

    /**
     * ChangePassword Page
     *
     * @return \Illuminate\View\View
     */
    public function changePasswordPage(): View
    {
        return view('user.profile.change_password');
    }

    /**
     * Change Password
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request): RedirectResponse
    {
        $this->profileService->changePassword($request);

        if ($this->profileService->changePassword($request)) {
            return redirect()->route('changePasswordPage')->with('info', 'Password Updated Successfully');
        } else {
            return redirect()->route('changePasswordPage')->with('info', 'Current Password is Wrong');
        }
    }
}
