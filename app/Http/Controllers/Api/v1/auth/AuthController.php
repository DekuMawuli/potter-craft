<?php

namespace App\Http\Controllers\Api\v1\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        dd($request->all());
    }


    public function signOut()
    {
        dd("Login Out");
    }
}
