<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use function Pest\Laravel\json;

class CommentController extends Controller
{
    public function index()
    {
       return Comment::with('user')->get();

    }
    public function create(Request $request)
    {
        $request->validate([
            'body'=>'required',
            'post_id'=>'required|numeric|exists:posts,id',
            'user_id'=>'required|numeric|exists:users,id'
        ]);

       $comment= Comment::create
       (
        [

             'body'=>$request->body,
             'user_id'=>$request->user_id,
             'post_id'=>$request->post_id
        ]
       );

       return response()->json([
           'data'=>$comment,
           'message'=>'Comment created'
       ],201);
    }
    public function update(Request $request,Comment $comment)
    {
        $request->validate([
            'body'=>'required',

        ]);
        $comment->body=$request->body;
        $comment->save();
        return response()->json([
            'data'=>$comment,
            'message'=>'Comment updated'
        ],200);
    }
    public function delete(Comment $comment)
    {
        $comment->delete();
        return response()->json(['message'=>'Comment deleted'],204);
    }
}

