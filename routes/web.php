<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware'=>'admin'], function (){

    Route::get('/admin', function (){

        return view('admin.index');

    });

    Route::resource('/admin/users', 'AdminUsersController', ['names'=>[

        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit',
        'destroy'=>'admin.users.destroy',

    ]]);

    Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

    Route::resource('/admin/posts', 'AdminPostsController', ['names'=>[

        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit',
        'destroy'=>'admin.posts.destroy',

    ]]);

    Route::resource('/admin/categories', 'AdminCategoriesController', ['names'=>[

        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit',
        'destroy'=>'admin.categories.destroy',

    ]]);

    Route::resource('/admin/medias', 'AdminMediasController', ['names'=>[

        'index'=>'admin.medias.index',
        'create'=>'admin.medias.create',
        'store'=>'admin.medias.store',
        'edit'=>'admin.medias.edit',
        'destroy'=>'admin.medias.destroy',

    ]]);
    Route::delete('admin/delete/medias', 'AdminMediasController@deleteMedia');

    Route::resource('/admin/comments', 'PostCommentsController', ['names'=>[

        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit',
        'destroy'=>'admin.comments.destroy',

    ]]);

    Route::resource('/admin/comment/replies', 'CommentRepliesController', ['names'=>[

        'index'=>'admin.replies.index',
        'create'=>'admin.replies.create',
        'store'=>'admin.replies.store',
        'edit'=>'admin.replies.edit',
        'destroy'=>'admin.replies.destroy',

    ]]);



});


