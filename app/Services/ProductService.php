<?php

namespace App\Services;

use App\Models\Product;

class ProductService 
{
   public function create($data) {
    $product = new Product();
    $product->fill($data);
    $product->save();


   }
   public function update($id, $data) {
    $product = Product::findOrFail($id);
    $product->fill($data);
    $product->save();

   }
   public function delete($id) {
    $product = Product::findOrFail($id);
    $product->delete();
   }
}
