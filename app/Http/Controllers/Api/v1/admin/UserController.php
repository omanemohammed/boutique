<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, User $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $order)
    {
        //
    }
}
