@extends('layouts.layouts')

@section('content')
<div class="container" style="margin-top:50px;">
    	<h1>Todoリスト更新</h1>
	<form action='{{ url('/todos',$todo->id) }}' method="post">
      	{{csrf_field()}}
      	{{ method_field('patch')}}
  		<div class="form-group">
    			<label >やることを更新してください</label>
    			<input type="text" name="body"class="form-control" value="{{ $todo->body }}" style="max-width:1000px;" required>
  		</div>
  		<button type="submit" class="btn btn-primary">更新する</button>
	</form>
</div>
@endsection
