<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Search;


class SearchController extends Controller
{
	public function index(Request $request){
　　　　　//$request->input()で検索時に入力した項目を取得します
		$search3 = $request->input('name');
		$search3 = "折原";
		$query = Search::query();

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


