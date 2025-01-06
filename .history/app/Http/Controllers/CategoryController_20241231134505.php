<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{    use AuthorizesRequests;
    public function index()
    {
        $this->authorize("is_admin",User::class);
        $Categories =Category::all();
        if($Categories)
        return view("Category",compact("Categories"));
        return redirect()->route('Category')->with('error', 'No Data Found');
    }
    public function create()
    {
        $this->authorize("is_admin",User::class);
        return view("tags.create");
    }
    public function store(Request $request)
    {
        $this->authorize("is_admin",User::class);
        $request->validate(["word"=>"required|unique:tags|min:3|max:50"]);
        if(Tag::create(["word"=>$request->word]))
        return redirect()->route('tags');
        return view("tags.index");
    }
    public function edit($id)
    {
        $this->authorize("is_admin",User::class);
        $tag=Tag::find($id);
        if($tag)
        return view("tags.edit",compact("tag"));
        return redirect()->route('tags')->with('error', 'Not Found ID='.$id);
    }
    public function update(Request $request, $id)
    {
        $this->authorize("is_admin",User::class);
            $tag=Tag::find($id);
            if($tag)
            {
                if($request->word!=$tag->word)
                {
                    $request->validate(["word"=>"required|unique:tags|min:3|max:50"]);
                    $tag->word=$request->word;
                    $tag->save();
                }
                return redirect()->route('tags');
            }
            return redirect()->route('tags')->with('error', 'Not Found ID='.$id);
    }
    public function destroy($id)
    {
        $this->authorize("is_admin",User::class);
            $tag = Tag::find($id);
            if($tag)
            {
                $tag->delete();
                return redirect()->route('tags');
            }
            return redirect()->route('tags')->with('error', 'Not Found ID='.$id);
    }

}
