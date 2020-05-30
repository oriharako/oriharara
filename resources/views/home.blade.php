@extends('layouts.app')

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>企業・ビジネスサイト向け 無料ホームページテンプレート tp_biz53</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="ここにサイト説明を入れます">
<meta name="keywords" content="キーワード１,キーワード２,キーワード３,キーワード４,キーワード５">
<link rel="stylesheet" href="css/home/style.css">

<link rel="stylesheet" href="css/home/mainimg.css">
<script src="js/openclose.js"></script>
<script src="js/fixmenu_pagetop.js"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<style>
</style>
<![endif]-->

@section('content')

<nav id="mainimg">
<ul>
<li id="img1"><a href="posts/index"><span>Board</span></a></li>
<li id="img2"><a href="todos/index"><span>My page</span></a></li>
<li id="img3"><a href="member/search"><span>Member</span></a></li>
<li id="img4"><a href="contact.html"><span>Contact</span></a></li>
</ul>
</nav>

@endsection
