<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService 
{
   /**
    * Create user.
    *@var array $data
    *@return User
    */
   public function create(array $data):User
   {
    $user = new User();
    $user->fill($data);
    $user->save();

    return $user;
   }
   public function update($user, $data) {
    if(!($user instanceof User)) {
       $user = User::findOrFail($user);
    }  
    $user->fill($data);
    $user->save();

    return $user;
   }
   public function delete(int|User $id):bool 
   {
    $user = User::findOrFail($id);
    $user->delete();

    return true;
   }
   public function register(array $data): array
    {
      $user = $this->create($data);
      $token = $user->createToken('API TOKEN')->plainTextToken;
      return compact('user', 'token');
     }
   public function login(array $data)
   {
      if(Auth::attempt($data)) {
         $user = User::where('email', $data['email'])->first();
         $token = $user->createToken('API TOKEN')->plainTextToken;

         return compact('user', 'token');
      }

      return false;

     }

     public function logout() 
     {
      /**
       * @var User $user
       */
         $user = auth()->user();
         $user->tokens()->delete();
         return true ;
     }


}
