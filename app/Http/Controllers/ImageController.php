<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Image;
use App\User;


class ImageController extends Controller
{
    //
public function input()
    {
        return view('image.input');
    }

public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            $path = $request->file->store('public');
            $file_name = basename($path);
            $user_id = Auth::user()->id;
            $new_image_data = new Image();
            $new_image_data->file_name = $file_name;

            Image::updateOrCreate(
            ['user_id' => $user_id],
            ['file_name' => $new_image_data->file_name,
             'user_id' => $user_id
            ]);


            return redirect('image/output');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }
public function output(Request $request) {
         $data = $request->session()->get('id');
	 $user_images = Image::all();
   return view('image.output', compact('data', 'user_images'));
}

}
