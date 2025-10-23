<?php

namespace App\Http\Controllers;


use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController  extends Controller
{

public function __construct()
{
    $this->middleware('auth:sanctum')->except('index','show');
}

    public function index(){
       $posts= Post::with('user','comment','tags')->paginate(10);


        return  PostResource::collection($posts);


    }
    public static function show(Post $post)
    {

         $post->comment;
         $post->user;
         $post->tags;
         return new PostResource($post);
    }
    public function store(Request $request)
    {
       $post= $request->user()->post()->create([
            'title' => request('title'),
            'content' => request('content'),
        ]);
       $post->tags;
        return new PostResource($post);
    }
    public function update(Post $post,Request $request){

        $this->authorize('update',$post );
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);


        $post->update($request->all());

        return new postResource($post);
    }
public function destroy(Post $post){

       $this->authorize('delete',$post);
       $post->delete();
       return response()->json(['message'=>'deleted successfully'],204);
}


}
