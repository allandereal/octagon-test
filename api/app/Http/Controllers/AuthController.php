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
            return response()->json(['login' => 'failed', 'errors' => ['wrong credentials']], 403);
        }
        
        Auth::loginUsingId($user->id);

        session(['token' => Str::random(64), 'user' => $user->id]);
        
        return response()->json([
            'login' => 'successful',
            'token' => session('token'),
            'user' => $user->getAttributes()]);
    }

    public function profile(Request $request)
    {
        return response('user profile fetched successfully');
    }
}
