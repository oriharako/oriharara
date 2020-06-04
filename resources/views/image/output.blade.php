@extends('layouts.app')

@section('content')
<div class="container mt-4">
	<div class="mb-4">
    		<a href="/upload" class="btn btn-success">画像を編集する</a>
	</div>
	<div class="card mb-4" style="border-radius:30%">
		@foreach ($user_images as $user_image)
		@if(Auth::user()->id === $user_image->user_id)
        	<img src="{{ asset('storage/' . $user_image['file_name']) }}" style="border-radius:30%">
		@endif    
		@endforeach
	</div>
	<div class="card mb-4">
		@foreach ($user as $users)
		@if(Auth::user()->id === $users->id)
			<div style="text-align: center;">
				<h2>名前 : {{$users->name}}</h2>
				<h2>メールアドレス : {{$users->email}}</h2>
			</div>
		@endif
		@endforeach
	</div>
	<div class="card mb-4" style="text-align: center;">
		<h2>今週のバディー : <a href="partner">yuki</a></h2>
	</div>
</div>
@endsection
