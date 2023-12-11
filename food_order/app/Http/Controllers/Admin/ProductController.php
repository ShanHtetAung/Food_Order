<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductFormRequest;
use App\Contracts\Services\Admin\ProductServiceInterface;
use App\Contracts\Services\Admin\CategoryServiceInterface;

class ProductController extends Controller
{
    /**
     * @var ProductServiceInterface
     */
    private $productService;

    private $categoryService;

    /**
     * Summary of __construct
     *
     * @param \App\Contracts\Services\Admin\ProductServiceInterface $productService
     * @param \App\Contracts\Services\Admin\CategoryServiceInterface $categoryService
     */
    public function __construct(ProductServiceInterface $productService, CategoryServiceInterface $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    /**
     * Products list
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list()
    {
        $products = $this->productService->list();

        return view('admin.product.list', compact('products'));
    }

    /**
     * redirect createpage
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = $this->categoryService->list();

        return view('admin.product.create', compact('categories'));
    }

    /**
     * create a product
     *
     * @param \App\Http\Requests\ProductFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductFormRequest $request)
    {
        $data = $this->requestProductInfo($request);
        $data['image'] = $this->uploadImage($request);

        $this->productService->create($data);

        return redirect()->route('food.admin.product.list')->with(['createSuccess' => 'Product Created...']);
    }

    /**
     * Summary of editPage
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $product = $this->productService->getProductById($id);
        $category = $this->categoryService->list();

        return view('admin.product.edit', compact('product', 'category'));
    }

    /**
     * Update a product
     *
     * @param \App\Http\Requests\ProductFormRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductFormRequest $request, int $id)
    {
        $data = $this->requestProductInfo($request);
        if ($request->hasFile('image')) {
            $this->deleteOldImage($id);
            $data['image'] = $this->uploadImage($request);
        }

        $this->productService->update($id, $data);

        return redirect()->route('food.admin.product.list')->with(['updateSuccess' => 'Product Updated...']);
    }

    /**
     * Delete product by id
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function delete(int $id)
    {
        $this->deleteOldImage($id);
        $this->productService->delete($id);

        return response()->json(['success' => true, 'tr' => 'tr_' . $id]);
    }

    /**
     * change product data to array
     *
     * @param \App\Http\Requests\ProductFormRequest $request
     * @return array
     */
    private function requestProductInfo(ProductFormRequest $request)
    {
        return [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ];
    }

    /**
     * upload image
     *
     * @param \App\Http\Requests\ProductFormRequest $request
     * @return string
     */
    private function uploadImage(ProductFormRequest $request)
    {
        $fileName = uniqid() . $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/product/', $fileName);

        return $fileName;
    }

    /**
     * Delete old image from storage
     *
     * @param int $id
     * @return void
     */
    private function deleteOldImage(int $id)
    {
        $product = $this->productService->getProductById($id);
        $oldImageName = $product->image;

        if ($oldImageName !== null) {
            Storage::delete('public/product/' . $oldImageName);
        }
    }
}
