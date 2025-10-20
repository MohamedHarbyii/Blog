<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
Route::get("/test/{comment}",function(\App\Models\Comment $comment){
    return $comment->post->user_id;
});
Route::middleware('auth:sanctum')->prefix("user")->controller(UserController::class)->
group(function(){
    Route::get('/','index');
    Route::patch('/{user}','update');
    Route::delete('/{user}','destroy');
});
Route::controller(AuthController::class)->group(function(){
    Route::post('/register','register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});
Route::get('/posts/', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::middleware('auth:sanctum')->prefix('posts')->controller(PostController::class)->group(function () {

    Route::post('/create','create')->name('api.posts.create');
    Route::patch('update/{post}','update')->name('api.posts.update');
    Route::delete('delete/{post}','delete')->name('api.posts.delete');

});
//Route::apiResource('posts', PostController::class);
Route::get('/comments/', [CommentController::class, 'index']);
Route::get('/comments/{comment}', [CommentController::class, 'show']);
Route::middleware('auth:sanctum')->prefix('comments')->controller(CommentController::class)->group(function () {

    Route::post('/create','create');
    Route::patch('update/{comment}','update');
    Route::delete('delete/{comment}','delete');

});
//Route::prefix('/tags')->controller(TagsController::class)->group(function () {
//   Route::get('/','index');
//    Route::post('/create','create');
//    Route::patch('update/{tag}','update');
//    Route::delete('delete/{tag}','delete');
//});
Route::apiResource('tags', TagsController::class);
