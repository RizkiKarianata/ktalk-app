<?php
namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController {
	protected $userModel;
	public function __construct() {
		$this->userModel = new UserModel();
	}
	public function index() {
		return view('welcome_message');
	}
	public function login() {
		$data = [
			'title' => 'KTalk | Login Page',
			'validation' => \Config\Services::validation()
		];
		return view('auth_login', $data);
	}
	public function register() {
		$data = [
			'title' => 'KTalk | Register Page',
			'validation' => \Config\Services::validation()
		];
		return view('auth_register', $data);
	}

	public function save() {
		if(!$this->validate([
			'fullname' => 'required|min_length[10]|max_length[100]',
			'email' => 'required|valid_email|is_unique[tb_user.email]',
			'password' => 'required|min_length[6]|max_length[25]'
		])) {
			return redirect()->to('/auth/register')->withInput();
		}
		$this->userModel->save([
			'fullname' => $this->request->getVar('fullname'),
			'email' => $this->request->getVar('email'),
			'password' => $this->request->getVar('password')
		]);
		session()->setFlashdata('success', 'Data saved successfully');
		return redirect()->to('/auth/login');
	}

	public function process() {
		if(!$this->validate([
			'email' => 'required|valid_email',
			'password' => 'required|min_length[6]|max_length[25]'
		])) {
			return redirect()->to('/auth/login')->withInput();
		}
		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');
		if($userData = $this->userModel->login_user($email,$password)) {
			session()->set([
				'email' => $userData['email'],
				'fullname' => $userData['fullname'],
				'id' => $userData['id'],
				'is_login' => TRUE
			]);
			return redirect()->to('/pages/home');
		}else {
			session()->setFlashdata('error', 'Data not found');
			return redirect()->to('/auth/login');
		}
	}
	public function logout() {
		session()->remove([
			'email',
			'fullname',
			'id',
			'is_login'
		]);
		return redirect()->to('/auth/login');
	}
}