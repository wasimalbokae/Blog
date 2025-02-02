<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Tags_posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
            $posts = Post::with('tags','category','comments','user')->withCount('comments')->orderBy('updated_at',"desc")->get();
            $total = $posts->sum('comments_count');
            if($posts)
            return view("posts.index",compact("posts","total"));
            return redirect()->route('posts')->with('error', 'No Data Found');
    }
    public function create()
    {
        $categories = Category::all();
        $tags=Tag::all();
        return view("Posts.create",compact("categories","tags"));
    }
    public function store(Request $request)
    {
        $arr_images=array();
        if($images=$request->file("image"))
        {
            $request->validate([
                'image.*' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
            ]);
            foreach($images as $image)
            {
                $imgName=$image->getClientOriginalName() . '-'. uniqid() . '.'.$image->getClientOriginalExtension();
                $arr_images[]=$imgName;
                $image->move(public_path("/images/posts"),$imgName);
            }
        }
        $request->validate( [
            "title"=>"required|min:3|max:50",
            "category"=>"required"]);
        if( $post=Post::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "image"=>json_encode($arr_images),
            "id_category"=>$request->category,
            "id_user"=>Auth::user()->id
            ]))
            {
                if(!empty($request->tags))
                foreach($request->tags as $tag)
                {
                    $post->tags()->attach($tag);
                }
                return redirect()->route('posts');
            }
        return view("posts.index");
    }
    public function show($id)
    {
        $post = Post::with(['category','user','comments.user'])->
        where('id', $id)->withCount("comments")->first();
        if($post)
        {
            $post->comments = $post->comments->sortByDesc('updated_at');
            $total = $post->comments_count;
            return view("posts.show",compact("post","total"));
        }
        return redirect()->route('posts')->with('error', 'Not Found ID='.$id);
    }
    public function edit($id)
    {
        $post = Post::with('tags.posts')->find($id);
        $tags=Tag::all();
        if($post && $post->id_user==Auth::user()->id)
        return view("posts.edit",compact("post","tags"));
        return redirect()->route('posts')->with('error', 'Not Found ID='.$id);
    }
    public function update(Request $request, $id)
    {
        $post = Post::with("tags")->find($id);
        $currentTags = $post->tags->pluck('id')->toArray();
        $newTags = $request->tags;
        if ($currentTags != $newTags)
        {
            $post->tags()->sync($newTags);
            $post->updated_at=now();
        }
            if($post && $post->id_user==Auth::user()->id)
            {
                $post->title=$request->title;
                $post->description=$request->description;
                $arr_images=array();
                if($images=$request->file("image"))
                {
                    $imgs=json_decode($post->image);
                    foreach($imgs as $img)
                    {
                        $image_path = public_path("\images\posts").'\\'.$img;
                        if(file_exists($image_path) && !empty($img))
                        {
                            unlink($image_path);
                        }
                    }
                    $request->validate(['image.*' => 'image|mimes:jpeg,jpg,png,gif|max:10000',]);
                    foreach($images as $image)
                    {
                        $imgName=$image->getClientOriginalName() . '-'. uniqid() . '.'.$image->getClientOriginalExtension();
                        $arr_images[]=$imgName;
                        $image->move(public_path("/images/posts"),$imgName);
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
