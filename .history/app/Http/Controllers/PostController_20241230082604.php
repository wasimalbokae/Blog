<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('id_user', Auth::user()->id);
        if($posts)
        return view("posts.index",compact("posts"));
        return redirect()->route('posts')->with('error', 'No Data Found');
    }
    public function create()
    {
        return view("Posts.index");
    }
    public function store(Request $request)
    {
        //
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
