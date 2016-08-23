<?php namespace Intranet\Http\Controllers\Home;

use View;
use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController {

	//Pass the user session
	public function home() {
		return view('homes.teacher');
	}
}