<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,

App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Models\Post;

use App\User;

use App\Models\Comment;

use Illuminate\Support\Facades\DB;

use Illuminate\Session\Store;

class PostsController extends Controller {

	public function index(Request $request) {
		$query = DB::table('posts');
		$posts = Post::orderBy('created_at', 'desc')->paginate(10);
  		return view('posts.index', compact('data', 'posts'));
	}

	public function create() {   
		return view('posts.create');
	}

	public function store(Request $request) {    
		$rules = [
		'title' => 'required|max:50',
		'body' => 'required|max:2000'
		];
		$messages = array(
			'title.required|max:50' => 'タイトルを正しく入力してください。',
			'body.required|max2000' => '本文を正しく入力してください。'
		);
		$id = Auth::user()->id;
    		$post = new Post;
    		$post->title = $request->input('title');
    		$post->body = $request->input('body');
    		$post->user_id = $id;
    		$post->save();
    		return redirect()->route('posts.index');
	}

	public function show($post_id) {
    		$post = Post::findOrFail($post_id);
    		return view('posts.show', [
        		'post' => $post
    		]);
	}

	public function edit($post_id) {
    		$post = Post::findOrFail($post_id);
    		return view('posts.edit', [
        		'post' => $post
    		]);
	}

	public function update($post_id, Request $request) {
    		$params = $request->validate([
        		'title' => 'required|max:50',
        		'body' => 'required|max:2000'
    		]);
    		$post = Post::findOrFail($post_id);
    		$post->fill($params)->save();
    		return redirect()->route('posts.show', ['post' => $post]);
	}

	public function destroy($post_id) {
    		$post = Post::findOrFail($post_id);
    		\DB::transaction(function () use ($post) {
        		$post->comments()->delete();
        		$post->delete();
    		});
    		return redirect()->route('posts.index');
	}

}
