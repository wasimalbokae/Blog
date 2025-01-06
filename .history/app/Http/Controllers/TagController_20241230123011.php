<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::all();
        if($tag)
        return view("tags.index",compact("tags"));
        return redirect()->route('tags')->with('error', 'No Data Found');
    }
    public function create()
    {
        return view("tags.create");
    }
    public function store(Request $request)
    {
        $arr_images=array();
        if($images=$request->file("image"))
        {
            foreach($images as $image)
            {
                $imgName=$image->getClientOriginalName() . '-'. uniqid() . '.'.$image->getClientOriginalExtension();
                $arr_images[]=$imgName;
                $image->move(public_path("/images"),$imgName);
            }
        }
        $request->validate( [
            "title"=>"required|min:3|max:50",
            "category"=>"required",
            'image'=>'mimes:jpeg,jpg,png,gif|max:10000']);
        if( Post::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "image"=>json_encode( $arr_images),
            "id_category"=>$request->category,
            "id_user"=>Auth::user()->id
            ]))
        return redirect()->route('posts');
        return view("posts.index");
    }
    public function show(tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tag $tag)
    {
        //
    }
}
