@extends('layouts.app')
<link rel="stylesheet" href="css/home/style.css">
<link rel="stylesheet" href="css/home/mainimg.css">
<script src="js/openclose.js"></script>
<script src="js/fixmenu_pagetop.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

@section('content')
<nav id="mainimg">
<ul>
<li id="img1" style="background-image: url(https://cdn.pixabay.com/photo/2016/04/15/04/02/water-1330252_960_720.jpg);"><a href="posts/index"><span>Board</span></a></li>
<li id="img2" style="background-image: url(https://cdn.pixabay.com/photo/2017/04/09/09/56/avenue-2215317_960_720.jpg);"><a href="image/output"><span>My page</span></a></li>
<li id="img3" style="background-image: url(https://cdn.pixabay.com/photo/2017/05/20/20/22/clouds-2329680_960_720.jpg);"><a href="todos/index"><span>To do</span></a></li>
<li id="img4" style="background-image: url(https://cdn.pixabay.com/photo/2015/11/04/20/59/milky-way-1023340_960_720.jpg);"><a href="contact/"><span>Contact</span></a></li>
</ul>
</nav>
@endsection
