<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductService 
{
   /**
    * Create product.
    *@var array $data
    *@return Product
    */
   public function create(array $data):Product
   {
    $product = new Product();
    $product->fill($data);
    $product->save();

    return $product;
   }
   public function update($product, $data) {
    if(!($product instanceof Product)) {
       $product = Product::findOrFail($product);
    }  
    $product->fill($data);
    $product->save();

    return $product;
   }
   public function delete(int|Product $id):bool 
   {
    $product = Product::findOrFail($id);
    $product->delete();

    return true;
   }
   public function register(array $data): array
    {
      $product = $this->create($data);
      $token = $product->createToken('API TOKEN')->plainTextToken;
      return compact('product', 'token');
     }
  


}
