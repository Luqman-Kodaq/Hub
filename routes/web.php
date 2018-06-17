<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'manage'], function() {

    // Home Controller
    Route::get('/home', 'DashboardController@dashboard')->name('home');

     // Profile Controller
     Route::get('/profile/{slug}', 'ProfileController@index')->name('profile.index');
     Route::get('/profile/edit/profile', 'ProfileController@edit')->name('profile.edit');
     Route::post('/profile/update/profile', 'ProfileController@update')->name('profile.update');

     // Settings Controller
     Route::get('/settings/edit', 'SettingController@edit')->name('setting.edit');
     Route::post('/settings/update', 'SettingController@update')->name('setting.update');

    // Users Controller
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::get('/users/add', 'UserController@create')->name('user.create');
    Route::post('/users/add', 'UserController@store')->name('user.store');
    Route::get('/users/show/{slug}', 'UserController@show')->name('user.show');
    Route::get('/users/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/users/edit/{id}', 'UserController@update')->name('user.update');
    Route::get('/users/delete', 'UserController@destroy')->name('user.destroy');

     // Posts Controller
     Route::get('/posts', 'PostController@index')->name('post.index');
     Route::get('/posts/draft', 'PostController@drafts')->name('post_draft.index');
     Route::get('/posts/add', 'PostController@create')->name('post.create');
     Route::post('/posts/add', 'PostController@store')->name('post.store');
     Route::get('/posts/publish/{id}', 'PostController@publish')->name('post.publish');
     Route::get('/posts/show/{id}', 'PostController@show')->name('post.show');
     Route::get('/posts/edit/{id}', 'PostController@edit')->name('post.edit');
     Route::post('/posts/edit/{id}', 'PostController@update')->name('post.update');
     Route::get('/posts/trash', 'PostController@onlyTrashed')->name('post.trash');
     Route::get('/posts/restore/{id}', 'PostController@restore')->name('post.restore');
     Route::get('/posts/delete', 'PostController@temporaryDelete')->name('post.destroy');
     Route::get('/posts/terminate/{id}', 'PostController@forceDelete')->name('post.terminate');

    // Role Controller
    Route::get('roles', 'RoleController@index')->name('role.index');
    Route::get('/roles/add', 'RoleController@create')->name('role.create');
    Route::post('/roles/add', 'RoleController@store')->name('role.store');
    Route::get('/roles/show/{id}', 'RoleController@show')->name('role.show');
    Route::get('/roles/edit/{id}', 'RoleController@edit')->name('role.edit');
    Route::post('/roles/edit/{id}', 'RoleController@update')->name('role.update');
    Route::get('/roles/delete', 'RoleController@destroy')->name('role.destroy');

     // Permission Controller
     Route::get('permissions', 'PermissionController@index')->name('permission.index');
     Route::get('/permissions/add', 'PermissionController@create')->name('permission.create');
     Route::post('/permissions/add', 'PermissionController@store')->name('permission.store');
     Route::get('/permissions/show/{id}', 'PermissionController@show')->name('permission.show');
     Route::get('/permissions/edit/{id}', 'PermissionController@edit')->name('permission.edit');
     Route::post('/permissions/edit', 'PermissionController@update')->name('permission.update');
     Route::get('/permissions/delete', 'PermissionController@destroy')->name('permission.destroy');

      //Tag Controller
      Route::get('tags', 'TagController@index')->name('tag.index');
      Route::get('/tags/add', 'TagController@create')->name('tag.create');
      Route::post('/tags/add', 'TagController@store')->name('tag.store');
      Route::get('/tags/edit/{id}', 'TagController@edit')->name('tag.edit');
      Route::post('/tags/edit', 'TagController@update')->name('tag.update');
      Route::get('/tags/delete', 'TagController@destroy')->name('tag.destroy');

      //Category Controller
      Route::get('categories', 'CategoryController@index')->name('category.index');
      Route::get('/categories/add', 'CategoryController@create')->name('category.create');
      Route::post('/categories/add', 'CategoryController@store')->name('category.store');
      Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('category.edit');
      Route::post('/categories/edit', 'CategoryController@update')->name('category.update');
      Route::get('/categories/delete', 'CategoryController@destroy')->name('category.destroy');
});