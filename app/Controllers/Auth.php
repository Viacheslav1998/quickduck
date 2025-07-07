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

		if (!isset($data->email, $data->password)) {
			return $this->response->setJSON([
				'status' => 'error',
				'message' => 'неверные данные'
			])->setStatusCode(400);
		}

		$user = $this->person->where('email', $data->email)->first();

		if ($user && password_verify($data->password, $user['password'])) {
			
			session()->set('user', [
				'id'    => $user['id'],
				'email' => $user['email'],
				'role'  => $user['role'],
			]);

			return $this->response->setJSON(['status' => 'success']);
		}

		return $this->response->setJSON([
			'status' => 'error',
		    'message' => 'ошибка что то не так'
		])->setStatusCode(401);
	}

	public function register()
	{
		$data = $this->request->getJSON();

		$this->person->insert([
			'name' => $data->name,
			'email' => $data->email,
			'password' => password_hash($this->password, PASSWORD_DEFAULT),
			'secret' => $data->secret,
			'role' => 'user'
		]);

		return $this->response->setJSON(['status' => 'Регистрация']);
	}

	public function logout()
	{
		session()->destroy();
		return $this->response->setJSON(['status' => 'logged out']);
	}
	
}