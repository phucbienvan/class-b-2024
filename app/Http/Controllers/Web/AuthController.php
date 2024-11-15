<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return redirect()->route('categories.index');
        }

        return redirect()->route('form.login')->with('error', 'Email or password is incorrect');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('form.login');
    }
}
