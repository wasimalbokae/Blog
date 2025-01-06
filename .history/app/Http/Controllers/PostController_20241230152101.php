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
        $posts = Post::where('id_user', Auth::user()->id)->get();
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
        dd($request);
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
    public function show($id)
    {
        $post=Post::find($id);
        if($post && $post->id_user==Auth::user()->id)
        return view("posts.show",compact("post"));
        return redirect()->route('posts')->with('error', 'Not Found ID='.$id);
    }
    public function edit($id)
    {
        $post=Post::find($id);
        if($post && $post->id_user==Auth::user()->id)
        return view("posts.edit",compact("post"));
        return redirect()->route('posts')->with('error', 'Not Found ID='.$id);
    }
    public function update(Request $request, $id)
    {
            $post=POST::find($id);
            if($post && $post->id_user==Auth::user()->id)
            {
                $post->title=$request->title;
                $post->description=$request->description;
                $arr_images=array();
                if($images=$request->file("image"))
                {
                    foreach($images as $image)
                    {
                        $imgName=$image->getClientOriginalName() . '-'. uniqid() . '.'.$image->getClientOriginalExtension();
                        $arr_images[]=$imgName;
                        $image->move(public_path("/images"),$imgName);
                    }
                    $post->image=json_encode($arr_images);
                }
                $post->save();
                return redirect()->route('posts');
            }
            return redirect()->route('posts')->with('error', 'Not Found ID='.$id);
    }
    public function destroy($id)
    {
            $post = Post::find($id);
            if($post && $post->id_user==Auth::user()->id)
            {
                $post->delete();
                return redirect()->route('posts');
            }
            return redirect()->route('posts')->with('error', 'Not Found ID='.$id);
    }
}
