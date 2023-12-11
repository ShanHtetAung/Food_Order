<?php

namespace App\Dao\User;

use App\Models\Contact;
use App\Contracts\Dao\User\ContactDaoInterface;


class ContactDao implements ContactDaoInterface
{
    public function createContacts(array $data, int $userId)
    {
        return Contact::create([
            'user_id' => $userId,
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);
    }
}
