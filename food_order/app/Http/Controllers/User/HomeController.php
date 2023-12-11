<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\User\CartServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\User\HomeServiceInterface;
use Illuminate\View\View;
use App\Contracts\Services\Admin\ProductServiceInterface;
use App\Contracts\Services\Admin\CategoryServiceInterface;

class HomeController extends Controller
{
    /**
     * @var HomeServiceInterface
     */
    private $homeService;

    private $productService;

    private $categoryService;

    private $cartService;

    /**
     * HomeController constructor
     *
     * @param HomeServiceInterface $homeService
     */
    public function __construct(HomeServiceInterface $homeService, ProductServiceInterface $productService, CategoryServiceInterface $categoryService, CartServiceInterface $cartService)
    {
        $this->homeService = $homeService;
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->cartService = $cartService;
    }

    /**
     * user/index function
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $cartListCount = $this->cartService->countCartList();
        $products = $this->productService->list();
        $categories = $this->categoryService->list();

        return view('user.index', compact('cartListCount', 'products', 'categories',));
    }

    /**
     * ajax show all products
     *
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function showAll()
    {
        $products = $this->productService->list();

        return response()->json(['products' => $products]);
    }

    /**
     * Ajax filter by category
     *
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function filter($id)
    {
        $products = $this->productService->filterByCategory($id);

        return response()->json(['products' => $products]);
    }

    /**
     * search using ajax
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = $this->productService->search($query);

        return response()->json(['products' => $products]);
    }

    /**
     * Add to cart function
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function addToCart(Request $request)
    {
        $status = $this->cartService->addToCart($request);
        if ($status == true) { // check whether the product is already in cart
            $cartCount = $this->cartService->countCartList();

            return response()->json(['success' => true, 'message' => 'Product added to cart successfully', 'cartCount' => $cartCount]);
        } else {
            return response()->json(['success' => false, 'message' => 'product is already in the cart']);
        }
    }

    public function thankUPage()
    {
        return view('user.thankU');
    }
}
