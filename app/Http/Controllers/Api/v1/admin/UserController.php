<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\UserRequest;
use App\Http\Resources\Api\V1\UserResource;
use App\Services\UserService;

class UserController extends Controller
{
    private UserService $userService;
    function __construct(UserService $userService){
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::pagination();
        return UserResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        $userData = $this->userService->register($request->validated());
        return UserResource::make($userData);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return UserResource::make($user);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user = $this->userService->update($user, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
