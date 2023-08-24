<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(SignupRequest $request)
    {
        $attributes = $request->validated();
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        $attributes["avatar"] = $avatarPath;
        $attributes['password'] = Hash::make($attributes['password']);
        $user = User::create($attributes);
        return response($user, 201);
    }
}
