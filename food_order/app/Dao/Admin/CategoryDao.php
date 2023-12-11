<?php

namespace App\Dao\Admin;

use App\Models\Category;
use App\Contracts\Dao\Admin\CategoryDaoInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryDao implements CategoryDaoInterface
{
    /**
     * return category list
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list(): Collection
    {
        $categories = Category::orderBy("created_at", "asc")->get();

        return $categories;
    }

    /**
     * create a category
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        Category::create($data);
    }

    /**
     * Get a category by id
     *
     * @param int $id
     * @return \App\Models\Category
     */
    public function getCategory(int $id): Category
    {
        return Category::where('id', $id)->first();
    }

    /**
     * Update the category
     *
     * @param int $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data): void
    {
        Category::where('id', $id)->update($data);
    }

    /**
     * Delete Category
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        Category::where('id', $id)->delete();
    }
}
