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

Route::group(['prefix' => 'manage', 'middleware' => 'admin'], function() {

    // Home Controller
    Route::get('/home', 'DashboardController@dashboard')->name('home');

     // Profile Controller
     Route::get('/profile/{slug}', 'ProfileController@index')->name('profile.index');
     Route::get('/profile/edit/profile', 'ProfileController@edit')->name('profile.edit');
     Route::post('/profile/update/profile', 'ProfileController@update')->name('profile.update');

     // Settings Controller
     Route::prefix('settings')->middleware('role:superadministrator|administrator')->group(function() {
     Route::get('/edit', 'SettingController@edit')->name('setting.edit');
     Route::post('/update', 'SettingController@update')->name('setting.update');
    });

    // Users Controller
    Route::prefix('users')->group(function() {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::get('/add', 'UserController@create')->name('user.create');
    Route::post('/add', 'UserController@store')->name('user.store');
    Route::get('/show/{slug}', 'UserController@show')->name('user.show');
    Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::get('/admin/{id}', 'UserController@makeAdmin')->name('user.admin');
    Route::get('/unadmin/{id}', 'UserController@notAdmin')->name('user.unadmin');
    Route::post('/edit/{id}', 'UserController@update')->name('user.update');
    Route::get('/delete', 'UserController@destroy')->name('user.destroy');
    });

     // Posts Controller
     Route::prefix('posts')->group(function() {
     Route::get('/', 'PostController@index')->name('post.index');
     Route::get('/draft', 'PostController@drafts')->name('post_draft.index');
     Route::get('/add', 'PostController@create')->name('post.create');
     Route::post('/add', 'PostController@store')->name('post.store');
     Route::get('/publish/{id}', 'PostController@publish')->name('post.publish');
     Route::get('/show/{id}', 'PostController@show')->name('post.show');
     Route::get('/edit/{id}', 'PostController@edit')->name('post.edit');
     Route::post('/edit/{id}', 'PostController@update')->name('post.update');
     Route::get('/trash', 'PostController@onlyTrashed')->name('post.trash');
     Route::get('/restore/{id}', 'PostController@restore')->name('post.restore');
     Route::get('/delete', 'PostController@temporaryDelete')->name('post.destroy');
     Route::get('/terminate/{id}', 'PostController@forceDelete')->name('post.terminate');
     });

    // Role Controller
    Route::prefix('roles')->group(function() {
    Route::get('/', 'RoleController@index')->name('role.index');
    Route::get('/add', 'RoleController@create')->name('role.create');
    Route::post('/add', 'RoleController@store')->name('role.store');
    Route::get('/show/{id}', 'RoleController@show')->name('role.show');
    Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit');
    Route::post('/edit/{id}', 'RoleController@update')->name('role.update');
    Route::get('/delete', 'RoleController@destroy')->name('role.destroy');
    });

     // Permission Controller
     Route::prefix('permissions')->group(function() {
     Route::get('/', 'PermissionController@index')->name('permission.index');
     Route::get('/add', 'PermissionController@create')->name('permission.create');
     Route::post('/add', 'PermissionController@store')->name('permission.store');
     Route::get('/show/{id}', 'PermissionController@show')->name('permission.show');
     Route::get('/edit/{id}', 'PermissionController@edit')->name('permission.edit');
     Route::post('/edit', 'PermissionController@update')->name('permission.update');
     Route::get('/delete', 'PermissionController@destroy')->name('permission.destroy');
     });

      //Tag Controller
      Route::prefix('tags')->middleware('role:superadministrator|administrator|editor')->group(function() {
      Route::get('/', 'TagController@index')->name('tag.index');
      Route::get('/add', 'TagController@create')->name('tag.create');
      Route::post('/add', 'TagController@store')->name('tag.store');
      Route::get('/edit/{id}', 'TagController@edit')->name('tag.edit');
      Route::post('/edit', 'TagController@update')->name('tag.update');
      Route::get('/delete', 'TagController@destroy')->name('tag.destroy');
      });

      //Category Controller
      Route::prefix('categories')->middleware('role:superadministrator|administrator|editor')->group(function() {
      Route::get('/', 'CategoryController@index')->name('category.index');
      Route::get('/add', 'CategoryController@create')->name('category.create');
      Route::post('/add', 'CategoryController@store')->name('category.store');
      Route::get('/edit/{id}', 'CategoryController@edit')->name('category.edit');
      Route::post('/edit', 'CategoryController@update')->name('category.update');
      Route::get('/delete', 'CategoryController@destroy')->name('category.destroy');
      });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
