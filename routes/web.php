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

/* ---- Blog ---- */
// INDEX
Route::get('/', ['as' => 'blog.index', 'uses' => 'BlogController@index']);
// SEARCH
Route::post('/', ['as' => 'blog.search', 'uses' => 'BlogController@search']);
// SHOW
Route::get('/wpis/{blog}', ['as' => 'blog.show', 'uses' => 'BlogController@show']);

/* ---- ADMIN ---- */
Route::group(['middleware' => 'roles', 'roles' => 'Admin'], function(){

    /* -- Blog Config -- */
    // INDEX
    Route::get('/blog-config', ['as' => 'blogconfig.index', 'uses' => 'BlogConfigController@index']);
    // TEXT
    Route::get('/blog-config/text', ['as' => 'blogconfig.text', 'uses' => 'BlogConfigController@text']);
    // TEXT UPDATE
    Route::put('/blog-config/text', ['as' => 'blogconfig.updateText', 'uses' => 'BlogConfigController@updateText']);
    // PAGINATION
    Route::get('/blog-config/pagination', ['as' => 'blogconfig.pagination', 'uses' => 'BlogConfigController@pagination']);
    // PAGINATION UPDATE
    Route::put('/blog-config/pagination', ['as' => 'blogconfig.updatePagination', 'uses' => 'BlogConfigController@updatePagination']);
    // IMAGE
    Route::get('/blog-config/image', ['as' => 'blogconfig.image', 'uses' => 'BlogConfigController@image']);
    // IMAGE UPDATE
    Route::put('/blog-config/image', ['as' => 'blogconfig.updateImage', 'uses' => 'BlogConfigController@updateImage']);


    /* -- Users -- */
    // PDF
    Route::get('/users/{user}/pdf', ['as' => 'users.pdf', 'uses' => 'UsersController@pdf']);
    // LOGS-TO-PDF
    Route::post('/users/logsToPDF', ['as' => 'users.logsToPdf', 'uses' => 'UsersController@logsToPdf']);
    // INDEX
    Route::get('/users', ['as' => 'users.index', 'uses' => 'UsersController@index']);
    // CREATE
    Route::get('/users/create', ['as' => 'users.create', 'uses' => 'UsersController@create']);
    // STORE
    Route::post('/users', ['as' => 'users.store', 'uses' => 'UsersController@store']);
    // SHOW
    Route::get('/users/{user}', ['as' => 'users.show', 'uses' => 'UsersController@show']);
    // EDIT
    Route::get('/users/{user}/edit', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
    // UPDATE
    Route::put('/users/{user}', ['as' => 'users.update', 'uses' => 'UsersController@update']);
    // DELETE
    Route::delete('/users/{user}', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);
    // RESET PASSWORD
    Route::get('/users/{user}/reset_password', ['as' => 'users.resetPassword', 'uses' => 'UsersController@resetPassword']);
    // UPDATE PASSWORD
    Route::put('/users/{user}/reset_password', ['as' => 'users.resetPassword', 'uses' => 'UsersController@updatePassword']);
});

/* ---- Moderator ---- */
Route::group(['middleware' => 'roles', 'roles' => 'Moderator'], function(){


});

/* ---- Uzytkownik ---- */
Route::group(['middleware' => 'roles', 'roles' => 'Uzytkownik'], function(){

    /* -- Users -- */
    // INDEX
    Route::get('/profile', ['as' => 'blog.user', 'uses' => 'BlogController@profile']);
    // UPDATE AVATAR
    Route::post('/profile', ['as' => 'blog.updateAvatar', 'uses' => 'BlogController@updateAvatar']);
    // UPDATE PASSWORD
    Route::put('/profile', ['as' => 'blog.updatePassword', 'uses' => 'BlogController@updatePassword']);

});

/* ---- Admin & Moderator ---- */
Route::group(['middleware' => 'roles', 'roles' => ['Admin', 'Moderator']], function(){

    /* -- Welcome -- */
    // INDEX
    Route::get('/welcome', ['as' => 'welcome.index', 'uses' => 'WelcomeController@index']);

    /* -- Users -- */
    // INDEX
    Route::get('/user/profile', ['as' => 'user.index', 'uses' => 'UserController@index']);
    // UPDATE PASSWORD
    Route::put('/user/profile', ['as' => 'user.updatePassword', 'uses' => 'UserController@updatePassword']);
    // UPDATE AVATAR
    Route::post('/user/profile', ['as' => 'user.updateAvatar', 'uses' => 'UserController@updateAvatar']);

    /* -- Posts -- */
    // PDF
    Route::get('/posts/{post}/pdf', ['as' => 'posts.pdf', 'uses' => 'PostsController@pdf']);
    // INDEX
    Route::get('/posts', ['as' => 'posts.index', 'uses' => 'PostsController@index']);
    // CREATE
    Route::get('/posts/create', ['as' => 'posts.create', 'uses' => 'PostsController@create']);
    // STORE
    Route::post('/posts', ['as' => 'posts.store', 'uses' => 'PostsController@store']);
    // SHOW
    Route::get('/posts/{post}', ['as' => 'posts.show', 'uses' => 'PostsController@show']);
    // DELETE
    Route::delete('/posts/{post}', ['as' => 'posts.destroy', 'uses' => 'PostsController@destroy']);
    // EDIT
    Route::get('/posts/{post}/edit', ['as' => 'posts.edit', 'uses' => 'PostsController@edit']);
    // UPDATE
    Route::put('/posts/{post}', ['as' => 'posts.update', 'uses' => 'PostsController@update']);

    /* -- Category -- */
    // INDEX
    Route::get('/categories', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
    // CREATE
    Route::get('/categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
    // STORE
    Route::post('/categories', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
    // SHOW
    Route::get('/categories/{category}', ['as' => 'categories.show', 'uses' => 'CategoriesController@show']);
    // DELETE
    Route::delete('/categories/{category}', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);

    /* -- Calendar -- */
    // INDEX
    Route::get('/calendar', ['as' => 'calendar.index', 'uses' => 'CalendarController@index']);
    // CREATE
    Route::get('/calendar/create', ['as' => 'calendar.create', 'uses' => 'CalendarController@create']);
    // STORE
    Route::post('/calendar', ['as' => 'calendar.store', 'uses' => 'CalendarController@store']);
    // DELETE
    Route::delete('/calendar/{event}', ['as' => 'calendar.destroy', 'uses' => 'CalendarController@destroy']);
});

/* ---- Admin & Moderator & Uzytkownik ---- */
Route::group(['middleware' => 'roles', 'roles' => ['Admin', 'Moderator', 'Uzytkownik']], function(){
    /* -- Comments -- */
    // STORE
    Route::post('/wpis/{blog}/', ['as' => 'comments.store', 'uses' => 'CommentsController@store']);
    // DELETE
    Route::delete('/wpis/{blog}/', ['as' => 'comments.destroy', 'uses' => 'CommentsController@destroy']);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
