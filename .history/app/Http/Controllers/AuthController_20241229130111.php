<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function register(Request $request)
    {
        dd("asd");
        $is_admin=false;
        if(!empty($request->is_admin) && $request->is_admin=="on")
            $is_admin=true;
            if($request->validate( [
                    'name' => 'required|min:3|max:50',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|confirmed|min:3',
                    "password_confirmation"=>"required|min:3",
                    'image' =>'mimes:jpeg,jpg,png,gif|max:10000'
                ]))
                {
                    $image=null;
                    if($request->hasFile("image"))
                    {
                        $image=$request->file("image");
                        $imgName=$image->getClientOriginalName() . '-'. uniqid() . '.'.$image->getClientOriginalExtension();
                        $image->move(public_path("/images"),$imgName);
                        $image=$imgName;
                    }
                    if(User::create([
                        "name"=>$request->name,
                        "email"=>$request->email,
                        "password"=>$request->password,
                        "password_confirmation"=>$request->password_confirmation,
                        "is_admin"=>$is_admin,
                        "image"=>$image,
                        ]))
                        {
                            if(Auth::check())
                            {
                                if(Auth::user()->is_admin)
                                 return redirect()->route('users.index');
                            }
                            $this->Login($request);
                        }
                }
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
            return redirect()->route('index');
        }
        return Redirect()->back()->withErrors("Invalid email or password");
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
