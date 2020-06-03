<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestMailController.php extends Controller
{
    //
public function send () {
	Mail::to('test@example.com')
    ->send(new TestMail());
}
}
