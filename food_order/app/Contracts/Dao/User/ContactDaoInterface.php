<?php

namespace App\Contracts\Dao\User;

interface ContactDaoInterface
{
    public function createContacts(array $data, int $userId);
}
