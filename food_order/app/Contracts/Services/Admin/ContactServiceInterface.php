<?php

namespace App\Contracts\Services\Admin;

interface ContactServiceInterface
{
    public function contactList();

    public function contactDelete(int $id);
}
