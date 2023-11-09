<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {

        if (Auth::attempt($request->only('email','password'))) {
            return response(['token' => $request->user()->createToken('invoice')], 200);
        }

        return response('Falha na autenticação',403);
    }
}
