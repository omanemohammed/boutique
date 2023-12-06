<?php

namespace App\Services;

use App\Models\Category;

class CategoryService 
{
   public function create($data) {
    $category = new Category();
    $category->fill($data);
    $category->save();


   }
   public function update($id, $data) {
    $category = Category::findOrFail($id);
    $category->fill($data);
    $category->save();

   }
   public function delete($id) {
    $category = Category::findOrFail($id);
    $category->delete();
   }
}
