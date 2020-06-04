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
//ウェルカムページ
Route::get('/', function () {
    return view('simple.index');
});

//認証系
Auth::routes();

//ホームページ
Route::get('/home', 'HomeController@index')->name('home');

//掲示板：一覧ページ
Route::get('posts/index', 'PostsController@index')->name('posts.index');

//掲示板：新規投稿、DB保存、詳細、編集、削除機能&ページ
Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);

//掲示板：コメント機能
Route::resource('comments', 'CommentsController', ['only' => ['store']]);

//マイページ
Route::get('image/output', 'ImageController@output'); 

//マイページ画像アップロード機能&ページ
Route::get('/upload', 'ImageController@input');
Route::post('/upload', 'ImageController@upload');

//TODO：一覧、編集、更新、削除、保存機能&ページ
Route::get('todos/index', 'TodosController@index');
Route::resource('todos', 'TodosController', ['only' => ['store', 'edit', 'update', 'destroy']]);

//お問い合わせフォーム
Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/confirm', 'ContactController@confirm')->name('confirm');
Route::post('contact/sent', 'ContactController@sent')->name('sent');

//バディー
Route::get('image/partner', 'ImageController@partner'); 


