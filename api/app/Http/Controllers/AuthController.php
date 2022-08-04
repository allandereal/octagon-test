<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function signup(SignupRequest $request)
    {
        $user = User::create([
            ...$request->only(['first_name', 'last_name', 'phone']),
            ...['password' => Hash::make($request->password)]
        ]);

        return new UserResource($user);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if(!Hash::check($request->password, $user->makeVisible(['password'])->password)){
            return response()
            ->json([
                'login' => 'failed',
                'message' => 'wrong credentials',
                'errors' => ['password' => ['password does not match']]
            ], 422);
        }

        Auth::loginUsingId($user->id);

        $access_token =  $user->createToken('auth_token')->accessToken;
        $user->update(['auth_token' => Str::random(64)]);

        return response()->json([
            'login' => 'successful',
            'token' => $user->auth_token,
            'access_token' => $access_token,
            'user' => new UserResource($user)
            ]
        );
    }

    public function profile(Request $request)
    {
        $user = User::query()
        ->where('auth_token', $request->token)
        ->first();

        return new UserResource($user);
    }

    public function logout(Request $request)
    {
        $user = User::query()
            ->where('auth_token', $request->token)
            ->first();

        $user->update(['auth_token' => null]);

        $request->user()->token()->revoke();

        return response()->json(['logout' => 'successful']);
    }
}
