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
        $users=User::all()->sortByDesc("updated_at");
        return view("users.index",compact("users"));
    }
    public function create()
    {
        if(Auth::check())
        if(Auth::user()->is_admin==false )
            Auth::logout();
        return view("users.create");
    }
    public function show(string $id)
    {
        $this->authorize("is_admin",User::class);
        $user=User::find($id);
        return view("users.show",compact("user"));
    }
    public function edit(string $id)
    {
        if(Auth::user()->id==$id || Auth::user()->is_admin)
        {
            $user=User::find($id);
            return view("users.edit",compact("user"));
        }
        abort(404);
    }
    public function update(Request $request, string $id)
    {
        if(Auth::user()->id==$id || Auth::user()->is_admin)
        {
                $route="";
                $request->validate(['name' => 'min:3|max:50']);
                $user=User::find($id);
                $user->name=$request->name;
                if($request->hasFile("image"))
                {
                    $request->validate([
                        "image" => "mimes:jpeg,jpg,png,gif|max:10000"
                    ]);
                    $img=json_decode($user->image);
                    $image_path = public_path("\images\users").'\\'.$img;
                    if(file_exists($image_path) && !empty($img))
                    {
                        unlink($image_path);
                    }
                    $image=$request->file("image");
                    $imgName=$image->getClientOriginalName() . '-'. uniqid() . '.'.$image->getClientOriginalExtension();
                    $image->move(public_path("/images/users"),$imgName);
                    $user->image=json_encode( $imgName);
                }
                if(!empty($request->password) && !empty($request->password_confirmation))
                {
                    $request->validate( [
                       'password' => 'required|confirmed|min:3',
                       "password_confirmation"=>"required|min:3"
                    ]);
                    $user->password=hash::make( $request->password);
                }
                if(Auth::user()->is_admin)
                {
                    if(!empty($request->is_admin) && isset($request->is_admin))
                    $user->is_admin=true;
                    if($user->is_admin==true && $request->is_admin==null)
                    $user->is_admin=false;
                    $route=redirect()->route('users.index');
                }
                else
                $route=redirect()->route('posts.index');
                $user->save();
                return $route;
        }
        abort(404);

    }
    public function destroy(string $id)
    {
        $this->authorize("is_admin",User::class);
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
