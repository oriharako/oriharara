<?php

class SearchController extends Controller
{
	public function index(Request $request){
		$query = User::query();
　　　　　//$request->input()で検索時に入力した項目を取得します
		$search1 = $request->select('purpose');
		$search2 = $request->select('birthplace');
		$search3 = $request->input('name');

         // プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択した棋力と一致するカラムを取得します
		if ($request->has('purpose') && $search1 != ('指定なし')) {
			$query->where('purpose', $search1)->get();
		}

         // プルダウンメニューで指定なし以外を選択した場合、$query->whereで選択した好きな戦法と一致するカラムを取得します
		if ($request->has('birthplace') && $search2 != ('指定なし')) 
			$query->where('birthplace', $search2)->get();
        }

        // ユーザ名入力フォームで入力した文字列を含むカラムを取得します
		if ($request->has('name') && $search3 != '') {
			$query->where('name', 'like', '%'.$search3.'%')->get();
        }

　　　　//ユーザを1ページにつき10件ずつ表示させます
		$data = $query->paginate(10);

		return view('member.search',[
			'data' => $data
		]);
	}
}
?>


