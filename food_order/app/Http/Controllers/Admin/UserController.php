<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Admin\UserServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\UserFormRequest;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * UserController constructor
     *
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     *User List
     *
     *@return \Illuminate\Database\Eloquent\Collection
     */
    public function list(): Collection
    {
        return $this->userService->list();
    }

    /**
     * Admin/index function
     *
     * @return object
     */
    public function index(): object
    {
        $users = $this->userService->getAllUser();

        return view("admin.user.list", compact("users"));
    }

    /**
     * User Create Form
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view("admin.user.create");
    }

    /**
     * Admin/store function
     *
     * @param UserFormRequest $request
     * @return object
     */
    public function store(UserFormRequest $request): object
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        $this->userService->userCreate($data);

        return redirect()->route('food.admin.user.list')->with('success', 'User Registertation Success');
    }

    /**
     * Admin/destroy function
     *
     * @param integer $id
     * @return object
     */
    public function destroy(int $id): object
    {
        $this->userService->userDestroy($id);

        return response()->json(['success' => true, 'tr' => 'tr_' . $id]);
    }
}
