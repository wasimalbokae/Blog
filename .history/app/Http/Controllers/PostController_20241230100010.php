<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('id_user', Auth::user()->id);
        dd($posts);
        if($posts)
        return view("posts.index",compact("posts"));
        return redirect()->route('posts')->with('error', 'No Data Found');
    }
    public function create()
    {
        $categories = Category::all();
        return view("Posts.create",compact("categories"));
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
    public function show(Post $post)
    {
        //
    }
    public function edit(Post $post)
    {
        //
    }
    public function update(Request $request, Post $post)
    {
        //
    }
    public function destroy(Post $post)
    {
        //
    }
}
