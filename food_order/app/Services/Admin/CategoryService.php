<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Contracts\Dao\Admin\CategoryDaoInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Contracts\Services\Admin\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var CategoryDaoInterface
     */
    private $categoryDao;

    /**
     * CategoryService constructor
     *
     * @param CategoryDaoInterface $categoryDao
     */
    public function __construct(CategoryDaoInterface $categoryDao)
    {
        $this->categoryDao = $categoryDao;
    }

    /**
     * return category lists
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list(): Collection
    {
        return $this->categoryDao->list();
    }

    /**
     * create a category
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        $this->categoryDao->create($data);
    }

    /**
     * get a category by id
     *
     * @param int $id
     * @return \App\Models\Category
     */
    public function getCategory(int $id): Category
    {
        return $this->categoryDao->getCategory($id);
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
        $this->categoryDao->update($id, $data);
    }

    /**
     * Delete category
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $this->categoryDao->delete($id);
    }
}
