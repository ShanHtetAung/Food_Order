<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Admin\ContactServiceInterface;

class ContactController extends Controller
{
    private $contactService;

    public function __construct(ContactServiceInterface $contractService)
    {
        $this->contactService = $contractService;
    }

    /**
     * admin/ContactList function
     *
     * @return object
     */
    public function contactList(): object
    {
        $contacts = $this->contactService->contactList();

        return view('admin.contact.contact_list', compact('contacts'));
    }

    /**
     * admin/contactDestroy function
     *
     * @param integer $id
     * @return object
     */
    public function contactDestroy(int $id): object
    {
        $this->contactService->contactDelete($id);
        return response()->json(['success' => true, 'tr' => 'tr_' . $id]);
    }
}
