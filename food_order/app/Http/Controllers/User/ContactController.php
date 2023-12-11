<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactsRequest;
use App\Contracts\Services\User\ContactServiceInterface;

class ContactController extends Controller
{
    private $contactService;

    public function __construct(ContactServiceInterface $contactService)
    {
        $this->contactService = $contactService;
    }

    public function contactCreate()
    {
        return view("user.contacts");
    }

    /**
     * user/Store function
     *
     * @param ContactsRequest $request
     * @return object
     */
    public function contactStore(ContactsRequest $request): object
    {
        $data = [
            "subject" => $request->subject,
            "message" => $request->message,
        ];
        $this->contactService->contacts($data);

        return redirect()->route('contactus')->with('success', 'We received your message and contact you within 48 hours.');
    }
}
