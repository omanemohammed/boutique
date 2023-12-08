<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\RegisterRequest;
use App\Http\Requests\Api\v1\LoginRequest;
use App\Http\Resources\Api\V1\AuthResource;
use App\Services\UserService;

class AuthController extends Controller
{
    private UserService $userService;
    function __construct(UserService $userService){
        $this->userService = $userService;
    }

    /**
     * Register.
     */
    public function register(RegisterRequest $request)
    {
        $userData = $this->userService->register($request->validated());
        return AuthResource::make($userData);


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
