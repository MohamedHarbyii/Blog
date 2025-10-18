<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use function Pest\Laravel\json;

class CommentController extends Controller
{
    public function index()
    {
       $comment=Comment::with('user')->get();
       return CommentResource::collection($comment);

    }
    public function create(Request $request)
    {
        $request->validate([
            'body'=>'required',
            'post_id'=>'required|numeric|exists:posts,id',

        ]);

       $comment= $request->user()->comment()->create([
           'body'=>$request->body,
           'post_id'=>$request->post_id
       ]);


       return new CommentResource($comment);
    }
    public function update(Request $request,Comment $comment)
    {
        $this->authorize('update',$comment);
        $request->validate([
            'body'=>'required',

        ]);
        $comment->body=$request->body;
        $comment->save();
        return new CommentResource($comment);
    }
    public function delete(Comment $comment)
    {
        $this->authorize('delete',$comment);
        $comment->delete();
        return response()->json(['message'=>'Comment deleted'],204);
    }
}

