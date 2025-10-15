<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use function Laravel\Prompts\error;
use function Pest\Laravel\json;

class PostController extends Controller
{
    public function index(){
       $posts= Post::with('user')->get();
        return $posts;
    }
    public static function find($id){
        return Post::findOrFail($id);
    }
    public function create()
    {
       $post= Post::create([
            'title' => request('title'),
            'content' => request('content'),
        ]);
        return response()->json(['message'=>'Post created','data'=>$post],201);
    }
    public function update($id,Request $request){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
         $post=$this->find($id);

        $post->update($request->all());

        return response()->json(['message'=>'updated successfully','data'=>$post]);
    }
public function delete($id){

       $post= $this->find($id);
       $post->delete();
       return response()->json(['message'=>'deleted successfully'],204);
}
}
