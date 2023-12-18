<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderService 
{
   /**
    * Create order.
    *@var array $data
    *@return Order
    */
   public function create(array $data):Order
   {
    $order = new Order();
    $order->fill($data);
    $order->save();

    return $order;
   }
   public function update($order, $data) {
    if(!($order instanceof Order)) {
       $order = Order::findOrFail($order);
    }  
    $order->fill($data);
    $order->save();

    return $order;
   }
   public function delete(int|Order $id):bool 
   {
    $order = Order::findOrFail($id);
    $order->delete();

    return true;
   }
   public function register(array $data): array
    {
      $order = $this->create($data);
      $token = $order->createToken('API TOKEN')->plainTextToken;
      return compact('order', 'token');
     }
   

}
