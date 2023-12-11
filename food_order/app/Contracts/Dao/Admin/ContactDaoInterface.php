<?php

namespace App\Contracts\Dao\Admin;

interface ContactDaoInterface
{
    public function contactList();

    public function contactDelete(int $id);
}
