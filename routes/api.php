<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// // List Posts
// Route::get('posts', 'PostController@index');

// // List Single Post
// Route::get('post/{id}', 'UserPostController@show');

// // Create New Post
// Route::post('post', 'UserPostController@store');

// // Update Post
// Route::put('post', 'UserPostController@store');
// // Delete Post
// Route::delete('post/{id}', 'UserPostController@destroy');



Route::get('posts/{post}/comments', 'CommentController@index')->name('comment.index');

Route::middleware('auth:api')->group(function () {
    Route::get('/posts/unique', 'PostController@apiCheckUnique')->name('api.posts.unique');
    Route::post('posts/{post}/comment', 'CommentController@store');
});