@extends('layouts.app')

@section('content')

<div class="container mt-4">
<a href="output" class="btn btn-success">マイページに戻る</a>
<div class="card mb-4" style="border-radius:30%">
<img src="{{ asset('storage/' . $user_images['file_name']) }}" style="border-radius:30%;">
</div>
<div class="card mb-4">
<div style="text-align: center;">
<h2>名前 : {{$user->name}}</h2>
<h2>メールアドレス :{{$user->email}}</h2>
</div>
</div>
</div>
@endsection

