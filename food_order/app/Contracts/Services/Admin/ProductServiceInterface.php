<?php

namespace App\Contracts\Services\Admin;

interface ProductServiceInterface
{
    public function list();

    public function create(array $data);

    public function getProductById(int $id);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function filterByCategory(int $categoryId);

    public function search(string $query);
}
