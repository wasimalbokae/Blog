<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request,$id_post)
    {
        if(comment::create([
            "content"=>$request->content,
            "id_user"=>Auth::user()->id,
            "id_post"=>$id_post,
            ]))
            {
                return redirect()->route('posts.show',$id_post);
            }
                return redirect()->route('posts.show',$id_post);
    }
    public function edit(Request $request, $id)
    {
        $comment=Comment::find($id);
        if($comment && $comment->id_user==Auth::user()->id)
        {
            $comment->content=$request->edit_content;
            $comment->save();
            return redirect()->route('posts.show',$comment->id_post);
        }
        return redirect()->route('posts')->with('error', 'Not Found ID='.$id);
    }
    public function destroy($id_post,$id)
    {
        $comment= comment::find($id);
        if($comment && ($comment->id_user==Auth::user()->id || $id_post==$comment->id_post))
        {
            $comment->delete();
            return redirect()->route('posts.show',$id_post);
        }
        return redirect()->route('posts.show',$id_post)->with('error', 'Not Found ID='.$id);
    }
}
