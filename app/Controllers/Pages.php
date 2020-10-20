<?php
namespace App\Controllers;
class Pages extends BaseController {
	public function index() {
		return view('welcome_message');
	}
	public function home() {
		if(session()->is_login == TRUE) {
			$data = [
				'title' => 'KTalk | Home Page'
			];
			return view('pages/home', $data);
		}else {
			return redirect()->to('/auth/login');
		}
	}
}