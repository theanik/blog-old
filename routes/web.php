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

Route::get('/', 'PostController@index')->name('welcome');
Route::get('post/{slug}','PostController@details')->name('post.details');

Route::get('category/{slug}','PostController@post_by_category')->name('category.post');
Route::get('tag/{slug}','PostController@post_by_tag')->name('tag.post');
Route::get('posts/bangla','PostController@post_bangla')->name('bangla.post');
Auth::routes();
Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth']], function () {
    Route::get('dashboard','DashBoardController@index')->name('dashboard');
    Route::resource('tag', 'TagController');
    Route::resource('category','CategoryController');
    Route::resource('post','PostController');

    Route::get('alladmin','AllAdminController@index')->name('admins.index');
    Route::get('alladmin/create','AllAdminController@createnew')->name('admins.createnew');
    Route::post('alladmin/store','AllAdminController@store')->name('admins.store');
    Route::delete('alladmin/{id}','AllAdminController@delete')->name('admins.delete');

    Route::get('authors','AuthorController@index')->name('authors.index');
    Route::delete('authors/{id}','AuthorController@delete')->name('authors.delete');

    Route::put('post/active/{id}','PostController@active')->name('post.active');
    Route::put('post/inactive/{id}','PostController@inactive')->name('post.inactive');

    Route::get('/subscriber','SubscriberController@index')->name('subscriber.index');
    Route::delete('/subscriber/{id}','SubscriberController@delete')->name('subscriber.delete');

    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@profileUpdate')->name('profile.update');
    Route::put('password-update','SettingsController@passwordUpdate')->name('password.update');
});

View::composer('layouts.frontend.partial.footer', function ($view) {
    $tags = App\Tag::take(9)->get();
    $view->with('tags',$tags);
});

View::composer('layouts.frontend.partial.header', function ($view) {
    $categories = App\Category::all();
    $view->with('categories',$categories);
});

View::composer('layouts.frontend.partial.header', function ($view) {
    $tags = App\Tag::all();
    $view->with('tags',$tags);
});

Route::get('/home', 'HomeController@index')->name('home');
