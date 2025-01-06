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
            if($request->validate( [
                    'name' => 'required|min:3|max:50',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|confirmed|min:3',
                    "password_confirmation"=>"required|min:3"                ]))
                {
                    dd($request);
                    $image=null;
                    if($request->hasFile("image"))
                    {
                        dd("asd");
                        // $request->validate( [
                        //     'image' =>'mimes:jpeg,jpg,png,gif|required|max:10000',
                        // ]);
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
                    return redirect()->route('users');
                }
            return redirect()->route('index');
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
