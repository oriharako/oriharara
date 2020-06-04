<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Session\Store;

use App\Image;

use App\User;

class ImageController extends Controller {

	public function input() {
        	return view('image.input');
    	}

	public function upload(Request $request) {
        	$this->validate($request, [
            		'file' => [
                		'required',
              			  'file',
      			          'image',
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
            			['file_name' => $new_image_data->file_name, 'user_id' => $user_id]
			);
            		return redirect('image/output');
        	} else {
           		 return redirect()
                		->back()
                		->withInput()
                		->withErrors();
        	}
    	}

	public function output(Request $request) {
		$user_images = Image::all();
         	$user = User::all();
   		return view('image.output', compact('user_images', 'user'));
	}

	public function partner() {
		 $user_images = Image::find(7);
         	 $user = User::find(1);
  		 return view('image.partner', compact('user_images', 'user'));
	}

}
