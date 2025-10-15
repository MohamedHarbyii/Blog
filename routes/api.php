<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
Route::get("/",function(){return "hi";});
Route::controller(AuthController::class)->group(function(){
    Route::post('/register','register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
})->middleware('auth:sanctum');
Route::prefix('posts')->controller(PostController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/create','create')->name('api.posts.create');
    Route::patch('{id}/update','update')->name('api.posts.update');
    Route::delete('{id}/delete','delete')->name('api.posts.delete');

});
Route::prefix('comments')->controller(CommentController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/create','create');
    Route::patch('{comment}/update','update');
    Route::delete('{comment}/delete','delete');
});
