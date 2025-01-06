<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize("is_admin",User::class);
        $users=User::all();
        return view("users.index",compact("users"));
    }
    public function create()
    {
        if(Auth::check())
        {
            if(Auth::user()->is_admin)
            {
                $this->authorize("is_admin",User::class);
                return view("users.create");
            }
        }
            Auth::logout();
            return view("users.create");

    }
    public function store(Request $request)
    {
        dd($request);
        // $is_admin=false;
        // if(!empty($request->is_admin))
        //     $is_admin=$request->is_admin;
        // if($request->validate( [
        //     'name' => 'required|min:3|max:50',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|confirmed|min:3',
        //     "password_confirmation"=>"required|min:3"
        // ]))
        // {
        //     $image=null;
        //     if(!empty($request->file("image")))
        //     {
        //         dd("asd");
        //         $request->validate( [
        //             'image' =>'mimes:jpeg,jpg,png,gif|required|max:10000',
        //         ]);
        //         $image=$request->file("image");
        //         $imgName=$image->getClientOriginalName() . '-'. uniqid() . '.'.$image->getClientOriginalExtension();
        //         $image->move(public_path("/images"),$imgName);
        //         $image=$imgName;
        //     }

        //     if(User::create([
        //         "name"=>$request->name,
        //         "email"=>$request->email,
        //         "password"=>$request->password,
        //         "password_confirmation"=>$request->password_confirmation,
        //         "is_admin"=>$is_admin,
        //         "image"=>$image,
        //         ]))
        //     return redirect()->route('users');
        // }
        // return view("users.index");
    }
    public function show(string $id)
    {
        $this->authorize("is_admin",User::class);
        $user=User::find($id);
        return view("users.show",compact("user"));
    }
    public function edit(string $id)
    {
        $user=User::find($id);
        return view("users.edit",compact("user"));
    }
    public function update(Request $request, string $id)
    {
        $this->authorize("is_admin",User::class);
        $request->validate(['name' => 'min:3|max:50']);
            $user=User::find($id);
            $user->name=$request->name;
            if(!empty($request->password) && !empty($request->password_confirmation))
            {
                $request->validate( [
                   'password' => 'required|confirmed|min:3',
                   "password_confirmation"=>"required|min:3"
                ]);
                $user->password=hash::make( $request->password);
            }
            if(!empty($request->is_admin) && isset($request->is_admin))
            $user->is_admin=true;
            if($user->is_admin==true && $request->is_admin==null)
            $user->is_admin=false;
            $user->save();
            return redirect()->route('users.index');
    }
    public function destroy(string $id)
    {
        $this->authorize("is_admin",User::class);
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
