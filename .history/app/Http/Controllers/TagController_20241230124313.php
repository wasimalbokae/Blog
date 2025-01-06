<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
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
        $request->validate(["word"=>"required|min:3|max:50"]);
        if(Tag::create(["word"=>$request->word]))
        return redirect()->route('Tags');
        return view("Tags.index");
    }
    public function show(tag $tag)
    {

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
