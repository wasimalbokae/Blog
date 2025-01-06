<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user=User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>$request->password,
                "password_confirmation"=>$request->password_confirmation,
                "is_admin"=>$is_admin,
            ]);
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('posts');
    }
    function formLogin()
    {
        Auth::logout();
        return view('auth.login');
    }
    function login(Request $request)
    {
        if(Auth::attempt(["email"=>$request->email,"password"=>$request->password]))
        {
            $request->session()->regenerate();
            return redirect()->route('posts');
        }
        return Redirect()->back()->withErrors("The Message");
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
