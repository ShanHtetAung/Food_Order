<?php

namespace App\Contracts\Dao\Admin;

interface CategoryDaoInterface
{
    public function list();

    public function create(array $data);

    public function getCategory(int $id);

    public function update(int $id, array $data);

    public function delete(int $id);
}
