<?php

namespace App\Dao\Admin;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\Admin\ContactDaoInterface;

class ContactDao implements ContactDaoInterface
{
    public function contactList()
    {
        return DB::table('contacts')
            ->leftJoin('users', 'contacts.user_id', '=', 'users.id')
            ->select('contacts.*', 'users.name', 'users.email')
            ->get();
    }

    public function contactDelete(int $id)
    {
        return Contact::destroy($id);
    }
}
