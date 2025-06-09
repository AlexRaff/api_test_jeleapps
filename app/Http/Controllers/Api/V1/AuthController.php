<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\RegisterRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function registration(RegisterRequest $request)
    {
        $user = User::create([
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'gender'   => $request->gender,
        ]);

        $token = $user->createToken('Api-token')->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
        ]);
    }

    public function profile(Request $request)
    {
        return new UserResource($request->user());
    }
}
