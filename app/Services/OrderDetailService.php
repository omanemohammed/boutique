<?php

namespace App\Services;

use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class OrderDetailService 
{
   /**
    * Create orderDetail.
    *@var array $data
    *@return OrderDetail
    */
   public function create(array $data):OrderDetail
   {
    $orderDetail = new OrderDetail();
    $orderDetail->fill($data);
    $orderDetail->save();

    return $orderDetail;
   }
   public function update($orderDetail, $data) {
    if(!($orderDetail instanceof OrderDetail)) {
       $orderDetail = OrderDetail::findOrFail($orderDetail);
    }  
    $orderDetail->fill($data);
    $orderDetail->save();

    return $orderDetail;
   }
   public function delete(int|OrderDetail $id):bool 
   {
    $orderDetail = OrderDetail::findOrFail($id);
    $orderDetail->delete();

    return true;
   }
   public function register(array $data): array
    {
      $orderDetail = $this->create($data);
      $token = $orderDetail->createToken('API TOKEN')->plainTextToken;
      return compact('orderDetail', 'token');
     }
  

}
