<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function register(Request $request)
    {
        $is_admin=false;
        if(!empty($request->is_admin) && $request->is_admin=="on")
            $is_admin=true;
        $request->validate( [
            'name' => 'min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:3',
            "password_confirmation"=>"required|min:3",
        ]);
            User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>$request->password,
                "password_confirmation"=>$request->password_confirmation,
                "is_admin"=>$is_admin,
            ]);
            $request->session()->regenerate();
            return redirect()->route('posts');
    }
    function formLogin()
    {

    }
    function login()
    {

    }
    function logout()
    {

    }
}
