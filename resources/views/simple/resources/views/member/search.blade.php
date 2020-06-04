<div class="row">
        <div class="col-sm-4">
            <div class="text-center my-4">
                <h3 class="brown border p-2">ユーザ検索</h3>
            </div>
	        <form action="member/search" method="get">
		@csrf
                <div class="form-group">
                <label for=“text”>ユーザー名</label>
                <input class=“form-control” name="name" type="text" value="">
		 </div>
                <input type = "submit" value = "送信">
                 </form>
        	</div>
        <div class="col-sm-8">
            <div class="text-center my-4">
                <h3 class="brown p-2">ユーザ一覧</h3>
            </div>

            <div class="container">
                <!--検索ボタンが押された時に表示されます-->
                @if(!empty($data))
                    <div class="my-2 p-0">
                        <div class="row  border-bottom text-center">
                            <div class="col-sm-4">
                                <p>ユーザ名</p>
                            </div>
                            <div class="col-sm-4">
                                <p>目的</p>
                            </div>
                            <div class="col-sm-4">
                                <p>出身地</p>
                            </div>
                        </div>
　　　　　　　　　　　　　　//検索条件に一致したユーザを表示します
                        @foreach($data as $item)
                                <div class="row py-2 border-bottom text-center">
                                    <div class="col-sm-4">
                                        <a href="">{{ $item->name }}</a>
                                    </div>
                                    <div class="col-sm-4">
                                        {{ $item->purpose }}
                                    </div>
                                    <div class="col-sm-4">
                                        {{ $item->birthplace }}
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
                @endif
            </div>
        </div>
    </div>
