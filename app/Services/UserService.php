<?php

namespace App\Services;

use App\Models\User;

class UserService 
{
   public function create($data) {
    $user = new User();
    $user->fill($data);
    $user->save();


   }
   public function update($id, $data) {
    $user = User::findOrFail($id);
    $user->fill($data);
    $user->save();

   }
   public function delete($id) {
    $user = User::findOrFail($id);
    $user->delete();
   }
}
