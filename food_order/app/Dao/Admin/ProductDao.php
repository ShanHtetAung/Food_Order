<?php

namespace App\Dao\Admin;

use App\Models\Product;
use App\Contracts\Dao\Admin\ProductDaoInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductDao implements ProductDaoInterface
{
    /**
     * products list
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list(): Collection
    {
        $products = Product::select('products.*', 'categories.name as category_name')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->orderBy('products.created_at', 'desc')
            ->get();

        return $products;
    }

    /**
     * create product
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        Product::create($data);
    }

    /**
     * Get product by Id
     *
     * @param mixed $id
     * @return \App\Models\Product
     */
    public function getProductById(int $id): Product
    {
        return Product::where('id', $id)->first();
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
        Product::where('id', $id)->update($data);
    }

    /**
     * Delete product by id
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        Product::where('id', $id)->delete();
    }

    /**
     * filter by category
     *
     * @param int $categoryId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function filterByCategory(int $categoryId): Collection
    {
        return Product::where('category_id', $categoryId)->get();
    }

    /**
     * search function using ajax
     *
     * @param string $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function search(string $query): Collection
    {
        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('price', $query)
            ->get();

        return $products;
    }
}
