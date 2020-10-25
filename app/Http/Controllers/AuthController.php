<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }
    public function proses_login(Request $request)
    {
       if (Auth::attempt($request->only('email', 'password'))) {
           return redirect('/')->with('message', '<div class="alert alert-success">Berhasil Login</div>');
       }
       return redirect('/login')->with('message', '<div class="alert alert-danger">Berhasil Gagal</div>');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
