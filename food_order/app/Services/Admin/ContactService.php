<?php

namespace App\Services\Admin;

use App\Contracts\Dao\Admin\ContactDaoInterface;
use App\Contracts\Services\Admin\ContactServiceInterface;

class ContactService implements ContactServiceInterface
{
    private $contactDao;

    public function __construct(ContactDaoInterface $contactDao)
    {
        $this->contactDao = $contactDao;
    }

    /**
     * admin/contactList function
     *
     * @return object
     */
    public function contactList(): object
    {
        return $this->contactDao->contactList();
    }

    /**
     * admin/contactDelete function
     *
     * @param integer $id
     * @return bool
     */
    public function contactDelete(int $id): bool
    {
        return $this->contactDao->contactDelete($id);
    }
}
