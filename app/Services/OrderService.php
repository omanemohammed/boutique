<?php

namespace App\Services;

use App\Models\Order;

class OrderService 
{
   public function create($data) {
    $order = new Order();
    $order->fill($data);
    $order->save();


   }
   public function update($id, $data) {
    $order = Order::findOrFail($id);
    $order->fill($data);
    $order->save();

   }
   public function delete($id) {
    $order = Order::findOrFail($id);
    $order->delete();
   }
}