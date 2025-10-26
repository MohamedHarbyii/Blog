<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\GoogleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix("user")->controller(UserController::class)->
group(function(){
    Route::get('/','index');
    Route::patch('/{user}','update')->middleware('auth:sanctum');
    Route::delete('/{user}','destroy')->middleware('auth:sanctum');
});
Route::controller(AuthController::class)->group(function(){
    Route::post('/register','register');
    Route::post('/login', 'login');
    Route::post('/auth/google','google_auth');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});



Route::apiResource('posts', PostController::class);
Route::apiResource('comments', CommentController::class);
Route::apiResource('tags', TagsController::class);
