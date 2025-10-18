<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Routing\Controllers\HasMiddleware;

use function Laravel\Prompts\error;
use function Pest\Laravel\json;
class PostController  extends Controller
{



    public function index(){
       $posts= Post::with('user','comment')->get();


        return  PostResource::collection($posts);


    }
    public static function show(Post $post){
         return new PostResource($post);
    }
    public function create(Request $request)
    {
       $post= $request->user()->post()->create([
            'title' => request('title'),
            'content' => request('content'),
        ]);
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
public function delete(Post $post){

       $this->authorize('delete',$post);
       $post->delete();
       return response()->json(['message'=>'deleted successfully'],204);
}


}
