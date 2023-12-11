<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Contracts\Services\Admin\CategoryServiceInterface;

class CategoryController extends Controller
{
    /**
     * @var CategoryServiceInterface
     */
    private $categoryService;

    /**
     * CategoryController constructor
     *
     * @param CategoryServiceInterface $categoryService
     */
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Summary of list
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list()
    {
        $categories = $this->categoryService->list();

        return view("admin.category.list", compact("categories"));
    }

    /**
     * Summary of createPage
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("admin.category.create");
    }

    /**
     *  create a category and validate the request
     *
     * @param \App\Http\Requests\CategoryFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryFormRequest $request)
    {
        $data = $this->requestCategoryData($request);
        $this->categoryService->create($data);

        return redirect()->route('food.admin.category.list')->with(['createSuccess' => 'category created.. ']);
    }

    /**
     * redirect to the edit page
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $category = $this->categoryService->getCategory($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update Category
     *
     * @param \App\Http\Requests\CategoryFormRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryFormRequest $request, int $id)
    {
        $data = $this->requestCategoryData($request);
        $this->categoryService->update($id, $data);

        return redirect()->route('food.admin.category.list')->with(['updateSuccess' => 'category updated.. ']);
    }

    /**
     * Delete category
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function delete(int $id)
    {
        $this->categoryService->delete($id);

        return response()->json(['success' => true, 'tr' => 'tr_' . $id]);
    }


    /**
     * request category data
     *
     * @param mixed $request
     * @return array
     */
    private function requestCategoryData($request)
    {
        return [
            'name' => $request->categoryName,
        ];
    }
}
