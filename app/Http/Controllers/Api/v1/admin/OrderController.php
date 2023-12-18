<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\OrderRequest;
use App\Http\Resources\Api\V1\OrderResource;
use App\Services\OrderService;

class OrderController extends Controller
{
    private OrderService $orderService;
    function __construct(OrderService $orderService){
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Order::pagination();
        return OrderResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        $orderData = $this->orderService->register($request->validated());
        return OrderResource::make($orderData);

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return OrderResource::make($order);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order)
    {
        $order = $this->orderService->update($order, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order = $this->orderService->delete($order);
        return $this->noContentResponse();
    }
}
