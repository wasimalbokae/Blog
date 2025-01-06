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
        $this->authorize("is_admin",User::class);
        if(Auth::user()->id==$id)
        {
            $user=User::find($id);
            return view("users.edit",compact("user"));
        }
        abort(404);
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
