<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryService
{
   /**
    * Create category.
    *@var array $data
    *@return Category
    */
   public function create(array $data):Category
   {
    $category = new Category();
    $category->fill($data);
    $category->save();

    return $category;
   }
   public function update($category, $data) {
    if(!($category instanceof Category)) {
       $category = Category::findOrFail($category);
    }  
    $category->fill($data);
    $category->save();

    return $category;
   }
   public function delete(int|Category $id):bool 
   {
    $category = Category::findOrFail($id);
    $category->delete();

    return true;
   }
   public function register(array $data): array
    {
      $category = $this->create($data);
      $token = $category->createToken('API TOKEN')->plainTextToken;
      return compact('category', 'token');
     }
  

}
