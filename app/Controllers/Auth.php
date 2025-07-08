<?php 

namespace App\Controllers;

use App\Models\PersonModel;
use CodeIgniter\Controller;
use \Firebase\JWT\JWT;

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
				'message' => 'не верные данные'
			])->setStatusCode(400);
		}

		$user = $this->person->where('email', $data->email)->first();

		if ($user && password_verify($data->password, $user['password'])) {
			$key = env('JWT_SECRET');
		    $payload = [
	            'iss' => "quickduck.com",
	            'iat' => time(),
	            'exp' => time() + 3600,
	            'uid' => $user['id'],
	            'email' => $user['email'],
	            'role' => $user['role']
	        ];

	        $jwt = JWT::encode($payload, $key, 'HS256');

	        return $this->response->setJSON([
	        	'status' => 'success',
	        	'token'  => $jwt
	        ]);
		}

		return $this->response->setJSON([
			'status' => 'error',
			'message' => 'не верный логин или пароль'
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