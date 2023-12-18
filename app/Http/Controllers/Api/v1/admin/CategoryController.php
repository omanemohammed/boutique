<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\CategoryRequest;
use App\Http\Resources\Api\V1\CategoryResource;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    private CategoryService $categoryService;
    function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Category::pagination();
        return CategoryResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $categoryData = $this->categoryService->register($request->validated());
        return CategoryResource::make($categoryData);

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return CategoryResource::make($category);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category = $this->categoryService->update($category, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category = $this->categoryService->delete($category);
        return $this->noContentResponse();
    }
}
