<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signup(SignupRequest $request)
    {
        return response('successfully signed up');
    }

    public function login(LoginRequest $request)
    {
        return response('successfully logged in');
    }

    public function profile(Request $request)
    {
        return response('user profile fetched successfully');
    }
}
