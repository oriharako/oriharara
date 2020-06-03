<?php

use Illuminate\Support\Facades\Route;

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
    return view('simple.index');
});
Route::get('/login', 'UsersController@login')->name('login');
Route::get('/register', 'UsersController@register')->name('register');
Route::get('/contact', function () {
    return view('simple.contact');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'contact', 'middleware' => 'auth'], function(){
Route::get('index', 'ContactFormController@index')->name('contact.index');

Route::get('create', 'ContactFormController@create')->name('contact.create');


});


Route::get('posts/index', 'PostsController@index')->name('posts.index');
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);


Route::resource('comments', 'CommentsController', ['only' => ['store']]);


Route::get('todos/index','TodosController@index')->name('todos.index');
Route::get('image/output', 'ImageController@output'); 

Route::resource('todos','TodosController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);

Route::get('/upload', 'ImageController@input');

Route::post('/upload', 'ImageController@upload');



//お問い合わせフォーム
Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/confirm', 'ContactController@confirm')->name('confirm');
Route::post('contact/sent', 'ContactController@sent')->name('sent');
