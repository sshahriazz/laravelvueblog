<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostsController;
use App\Http\Controllers\API\CommentsController;
use App\Http\Controllers\API\UserController;


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
Route::get('posts',[PostsController::class,'index']);
Route::get('posts/{id}',[PostsController::class,'userPosts']);
Route::get('userpost/{id}',[PostsController::class,'userPostsPaginated']);
Route::get('singlepost/{id}',[PostsController::class,'singlePost']);
//Route::group(['prefix' => 'posts', 'middleware' => 'auth:sanctum'], function () {
Route::post('post/{user}/add',[PostsController::class, 'store']);
Route::put('post/{id}/update',[PostsController::class, 'update']);
Route::post('post/{post}/comment',[CommentsController::class,'store']);
Route::get('post/{post}',[PostsController::class, 'show']);
Route::get('post/{post}/comments',[PostsController::class, 'show_comments']);
Route::delete('post/{id}',[PostsController::class, 'destroy']);
Route::get('comments',[CommentsController::class,'index']);
Route::get('comment/{comment}', [CommentsController::class,'show']);
Route::delete('comment/{comment}',[CommentsController::class,'destroy']);
//});
Route::get('user', [UserController::class, 'getAllUser']);
Route::get('user/{id}', [UserController::class, 'getAllUserById']);

