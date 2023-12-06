<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\RegisterRequest;
use App\Http\Requests\Api\v1\LoginRequest;
use App\Http\Resources\Api\v1\AuthResource;
use App\Models\User;
use Illuminate\Http\Response;

class AuthController extends Controller
{
   

    /**
     * Register.
     */
    public function register(RegisterRequest $request)
    {

        $data = $request->validated();
        $user = User::create($data);

        // return response()->json([
        //     'status' => true,
        //     'user'   => $user,
        // ], Response::HTTP_CREATED);

        return AuthResource::make($user);


    }



    /**
     * Login.
     */
    public function login(LoginRequest $request)
    {
        //
    }

    /**
     * Logout.
     */
    public function logout()
    {
        //
    }
}
