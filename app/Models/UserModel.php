<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
	protected $table = 'tb_user';
	protected $useTimestamps = true;
	protected $allowedFields = ['fullname', 'email', 'password'];
	public function getUser($id = false) {
		if($id == false) {
			return $this->findAll();
		}
		return $this->where(['id' => $id])->first();
	}
	function login_user($email,$password) {
		$data_user = $this->where(['email'=>$email, 'password'=>$password]);
		if($data_user->countAllResults(false) > 0) {
			$tampil = $data_user->first();
			return $tampil;
		}
	}
	
	function cek_login() {
		if(empty($this->session->userdata('is_login'))) {
			return redirect()->to('/auth/login');
		}
	}
}