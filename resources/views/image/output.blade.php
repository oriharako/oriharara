@extends('layouts.app')

@section('content')
    <a href="/upload">画像のアップロードに戻る</a>
    <br>


    @foreach ($user_images as $user_image)
@if(Auth::user()->id === $user_image->user_id)
        <img src="{{ asset('storage/' . $user_image['file_name']) }}">

        <br>
@endif    
 @endforeach

@endsection
