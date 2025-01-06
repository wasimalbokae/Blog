<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\tag;
use App\Models\User;

use Illuminate\Http\Request;

class TagController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize("is_admin",User::class);
        $tags = Tag::all();
        if($tags)
        return view("tags.index",compact("tags"));
        return redirect()->route('tags')->with('error', 'No Data Found');
    }
    public function create()
    {
        return view("tags.create");
    }
    public function store(Request $request)
    {
        $request->validate(["word"=>"required|unique:tags|min:3|max:50"]);
        if(Tag::create(["word"=>$request->word]))
        return redirect()->route('tags');
        return view("tags.index");
    }
    public function edit($id)
    {
        $tag=Tag::find($id);
        if($tag)
        return view("tags.edit",compact("tag"));
        return redirect()->route('tags')->with('error', 'Not Found ID='.$id);
    }
    public function update(Request $request, $id)
    {
            $tag=Tag::find($id);
            if($tag)
            {
                $tag->word=$request->word;
                $tag->save();
                return redirect()->route('tags');
            }
            return redirect()->route('tags')->with('error', 'Not Found ID='.$id);
    }
    public function destroy($id)
    {
            $tag = Tag::find($id);
            if($tag)
            {
                $tag->delete();
                return redirect()->route('tags');
            }
            return redirect()->route('tags')->with('error', 'Not Found ID='.$id);
    }
}
