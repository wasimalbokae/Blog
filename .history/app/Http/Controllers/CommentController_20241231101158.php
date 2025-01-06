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
        if( $comment=comment::create([
            "content"=>$request->content,
            "id_user"=>Auth::user()->id,
            "id_post"=>$id_post,
            ]))
            {
                return redirect()->route('posts.show',$id_post);
            }
                return redirect()->route('posts.show',$id_post);
    }

    /**
     * Display the specified resource.
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,Post $post,comment $comment)
    {
        $id=$comment->id;
        // $comment=Comment::find($id);
        dd($post->id,$comment->id_post);
        if($comment && ($comment->id_user==Auth::user()->id || $post->id==$comment->id_post))
        {
            $comment->content=$request->edit_comment;
            return redirect()->route('posts.show',$comment->id_post);
        }
        return redirect()->route('posts')->with('error', 'Not Found ID='.$id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comment= comment::find($id);
        if($comment && $comment->id_user==Auth::user()->id)
        {
            $comment->delete();
            return redirect()->route('posts.show',$comment->id_post);
        }
        return redirect()->route('posts.show',$comment->id_post)->with('error', 'Not Found ID='.$id);
    }
}
