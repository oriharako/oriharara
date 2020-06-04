@extends('layouts.app')

@section('content')
<div class="container mt-4">
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    	<li>{{ $error }}</li>
    @endforeach
</ul>
@endif
	<form action="/upload" method="post" enctype="multipart/form-data">
    	@csrf
		<label for="photo">画像ファイル:</label>
    		<input type="file" class="form-control" name="file">
    		<br>
    		<div class="mb-4">
    			<input type="submit" class="btn btn-primary">
    		</div>
	</form>
</div>
@endsection
