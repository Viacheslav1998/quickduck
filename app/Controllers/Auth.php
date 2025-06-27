<?php 

namespace App\Controllers;

use App\Models\PersonModel;
use CodeIgniter\Controller;

class Auth extends Controller 
{
	protected $person;

	public function __construct()
	{
		$this->person = new PersonModel();
	}

	public function login()
	{
		$data = $this->request->getJSON();
		$user = $this->person->where('email', $data->email)->firts();

		if ($user && password_verify($data->password, $user[$password])) {
			session()->set('user', [
				'id' => $user['id'],
				'email' => $user['email'],
				'role'  => $user['role'],
			]);
			return $this->response->setJSON(['status' => 'success']);
		}

		return $this->response->setJSON(['status' => 'error', 'message' => 'ошибка что то не так'])->setStatusCode(401);
	}

	public function register()
	{
		$data = $this->request->getJSON();

		$this->person->insert([
			'email' => $data->email,
			'password' => password_hash($this->password, PASSWORD_DEFAULT),
			'role' => 'user'
		]);

		return $this->response->setJSON(['status' => 'registered']);
	}

	public function logout()
	{
		session()->destroy();
		return $this->response->setJSON(['status' => 'logged out']);
	}
	
}