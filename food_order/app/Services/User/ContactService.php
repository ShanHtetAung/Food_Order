<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;
use App\Contracts\Dao\User\ContactDaoInterface;
use App\Contracts\Services\User\ContactServiceInterface;

class ContactService implements ContactServiceInterface
{

    private $contactDao;

    public function __construct(ContactDaoInterface $contactDao)
    {
        $this->contactDao = $contactDao;
    }

    /**
     * user/contacts function
     *
     * @param array $data
     * @return array
     */
    public function contacts(array $data): object
    {
        $userId = Auth::user()->id;
        $data = [
            'subject' => $data['subject'],
            'message' => $data['message'],
        ];

        return $this->contactDao->createContacts($data, $userId);
    }
}
