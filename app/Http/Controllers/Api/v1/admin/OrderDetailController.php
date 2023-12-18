<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Models\OrderDetail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\OrderDetailRequest;
use App\Http\Resources\Api\V1\OrderDetailResource;
use App\Services\OrderDetailService;

class OrderDetailController extends Controller
{
    private OrderDetailService $orderDetailService;
    function __construct(OrderDetailService $orderDetailService){
        $this->orderDetailService = $orderDetailService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = OrderDetail::pagination();
        return OrderDetailResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderDetailRequest $request)
    {
        $orderDetailData = $this->orderDetailService->register($request->validated());
        return OrderDetailResource::make($orderDetailData);

    }

    /**
     * Display the specified resource.
     */
    public function show(OrderDetail $orderDetail)
    {
        return OrderDetailResource::make($orderDetail);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderDetailRequest $request, OrderDetail $orderDetail)
    {
        $orderDetail = $this->orderDetailService->update($orderDetail, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderDetail $orderDetail)
    {
        $orderDetail = $this->orderDetailService->delete($orderDetail);
        return $this->noContentResponse();
    }
}
