@extends('layouts.layouts')

@section('content')
<div class="container mt-4">
      	<div class="card mb-4">
		<div class="container" style="margin-top:50px;">
                       	<h1>Todoリスト追加</h1>
		</div>  
		<form action='{{ url('/todos')}}' method="post">
		{{csrf_field()}}
                	<div class="form-group">
				<label >やることを追加してください</label>
                        	<input type="text" name="body" class="form-control" placeholder="todo list" style="max-width:1000px;" required>
			</div>
                        <button type="submit" class="btn btn-primary" style="width:100px;">追加する</button> 
		</form>
		<h1 style="margin-top:50px;">Todoリスト</h1>
    		<table class="table table-striped" style="max-width:1000px; margin-top:20px;">
			@foreach ($todos as $todo)
				@if($todo->user_id === Auth::user()->id)
    					<tr>
      						<td>{{$todo->body}}</td>
      						<td>
							<form action="{{ action('TodosController@edit', $todo) }}" method="get">
          						{{ csrf_field() }}
          						{{ method_field('get') }}
          							<button type="submit" class="btn btn-primary">編集</button>
      							</form>
      						</td>
      						<td>
							<form action="{{url('/todos', $todo->id)}}" method="post">
          						{{ csrf_field() }}
          						{{ method_field('delete') }}
          							<button type="submit" class="btn btn-danger">削除</button>
      							</form>
      						</td>
    					</tr>
				@endif
    			@endforeach
  		</table>
	</div>
</div>
@endsection
