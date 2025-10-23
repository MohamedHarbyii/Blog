<?php

namespace App\Http\Controllers;


use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum')->except('index','show');
    }
    public function index()
    {
       $comment=Comment::with('user')->paginate(10);
       return CommentResource::collection($comment);

    }
    public function show(Comment $comment)
    {
        return new commentResource($comment);
    }
    public function store(Request $request)
    {
        $request->validate([
            'body'=>'required',
            'post_id'=>'bail|required|numeric|exists:posts,id',

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

        $request->validate(['body'=>'required',]);

        $comment->body=$request->body;

        $comment->save();

        return new CommentResource($comment);
    }
    public function destroy(Comment $comment)
    {
        $this->authorize('delete',$comment);
        $comment->delete();
        return response()->json(['message'=>'Comment deleted'],204);
    }
}

