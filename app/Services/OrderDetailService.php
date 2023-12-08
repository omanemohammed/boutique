<?php

namespace App\Services;

use App\Models\OrderDetail;

class OrderDetailService 
{
   public function create($data) {
    $orderDetail = new OrderDetail();
    $orderDetail->fill($data);
    $orderDetail->save();

    return $orderDetail;

   }
   public function update($id, $data) {
    $orderDetail = OrderDetail::findOrFail($id);
    $orderDetail->fill($data);
    $orderDetail->save();

    return $orderDetail;

   }
   public function delete($id) {
    $orderDetail = OrderDetail::findOrFail($id);
    $orderDetail->delete();

    return true;
   }
}
