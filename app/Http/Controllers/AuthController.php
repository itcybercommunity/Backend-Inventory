<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseLoginController;
use Auth;
use Validator;

class AuthController extends BaseLoginController
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
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            return $this->responseError('Login Failed', 422, $validator->errors());
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $response = [
                // 'token' => $user->createToken('MyToken')->accessToken,
                'name' => $user->name
            ];
            return $this->responseOk($response);
        }else {
            return $this->responseError("Wrong Password", 401);
        }
    }
}
