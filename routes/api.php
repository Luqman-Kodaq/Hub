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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group([ 'prefix' => 'auth'], function () {
    Route::post('/register', 'AuthController@register');
    // Route::post('login', 'AuthController@login');
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');

// });

Route::group(['prefix' => 'manage'], function(){
    // User Controller
    Route::apiResource('/users', 'UserController');

    // Post Controller
    Route::apiResource('/posts', 'PostController');

    // Profile Controller
    Route::apiResource('/profile', 'ProfileController');

    // Settings Controller
    Route::get('/settings', 'SettingController@index')->name('setting.index');
    Route::put('/setting/{id}', 'SettingController@update')->name('setting.update');

    // Role Controller
    Route::apiResource('/roles','RoleController');

    // Permission Controller
    Route::apiResource('/permissions', 'PermissionController');

    // Tag Controller
    Route::apiResource('/tags', 'TagController');

    // Category Controller
    Route::apiResource('/categories', 'CategoryController');
});

Route::get('posts/{post}/comments', 'CommentController@index')->name('comment.index');

Route::middleware('auth:api')->group(function () {
    Route::get('/posts/unique', 'PostController@apiCheckUnique')->name('api.posts.unique');
    Route::post('posts/{post}/comment', 'CommentController@store');
});