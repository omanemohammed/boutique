<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\ProductRequest;
use App\Http\Resources\Api\V1\ProductResource;
use App\Services\ProductService;

class ProductController extends Controller
{
    private ProductService $productService;
    function __construct(ProductService $productService){
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Product::pagination();
        return ProductResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $productData = $this->productService->register($request->validated());
        return ProductResource::make($productData);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return ProductResource::make($product);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product = $this->productService->update($product, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product = $this->productService->delete($product);
        return $this->noContentResponse();
    }
}
