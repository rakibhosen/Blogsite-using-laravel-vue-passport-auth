<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Auth;

class CommentController extends Controller
{
    public function allComments($id){
        $allComments = Comment::with('user')->where('post_id',$id)->get();
        
        return response()->json([
            'success'=>true,
            'data'=>$allComments
        ]);
    }
  public function addComment(Request $request){
    $this->validate($request,[
        'comment_body'=>'required|min:3',
   
    ]);
    $comment = new Comment();
    $comment->user_id = Auth::user()->id;
    $comment->post_id = $request->post_id;
    $comment->comment_body =$request->comment_body;
    $comment->save();

    return response()->json([
        'message'=>'Comment added',
        'data'=>$request->all()
    ]);

  }
}
