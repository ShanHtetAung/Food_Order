<?php

namespace App\Services\Admin;

use App\Models\Product;
use App\Contracts\Dao\Admin\ProductDaoInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Contracts\Services\Admin\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{
    /**
     * @var ProductDaoInterface
     */
    private $productDao;

    /**
     * ProductService constructor
     *
     * @param ProductDaoInterface $productDao
     */
    public function __construct(ProductDaoInterface $productDao)
    {
        $this->productDao = $productDao;
    }

    /**
     * Return lists of product
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list(): Collection
    {
        return $this->productDao->list();
    }

    /**
     * create a product
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        $this->productDao->create($data);
    }

    /**
     * Get Product by Id
     *
     * @param int $id
     * @return \App\Models\Product
     */
    public function getProductById(int $id): Product
    {
        return $this->productDao->getProductById($id);
    }

    /**
     * Update a product
     *
     * @param int $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data): void
    {
        $this->productDao->update($id, $data);
    }

    /**
     * Delete product by id
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $this->productDao->delete($id);
    }

    /**
     * filter by category using ajax
     *
     * @param int $categoryId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function filterByCategory(int $categoryId): Collection
    {
        return $this->productDao->filterByCategory($categoryId);
    }

    /**
     * search using ajax
     * 
     * @param string $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function search(string $query): Collection
    {
        return $this->productDao->search($query);
    }
}
