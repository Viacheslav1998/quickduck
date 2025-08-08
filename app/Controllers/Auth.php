<?php 

namespace App\Controllers;

use App\Models\PersonModel;
use CodeIgniter\Controller;
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class Auth extends Controller 
{
	protected $person;

	public function __construct()
	{
		$this->person = new PersonModel();
	}

	public function me()
	{	
		$authHeader = $this->request->getHeaderLine('Authorization');

		if (!$authHeader || !preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
			return $this->response->setJSON([
				'message' => 'Token not provided'
			])->setStatusCode(401);
		}

		$token = $matches[1];
		$key = getenv('JWT_SECRET');

		try {
			$decoded = JWT::decode($token, new Key($key, 'HS256'));

			$user = $this->person->find($decoded->uid);

			if(!$user) {
				return $this->response->setJSON([
					'message' => 'User not found'
				])->setStatusCode(404);
			}

			return $this->response->setJSON([
				'user' => [
					'id' => $user['id'],
					'email' => $user['email'],
					'role' => $user['role'],
					'name' => $user['name']
				]
			]);
		} catch (\Exception $e) {
			return $this->response->setJSON([
				'message' => 'Invalid or expired token'
			])->setStatusCode(401);
		}

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
	        	'status' => 'Login Successful',
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
		$name = $this->request->getPost('name');
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
		$secret = $this->request->getPost('secret');
		$role = $this->request->getPost('role');

		$imagen = $this->request->getFile('imagen');
		if($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
			$imagenName = $imagen->getRandomName();
			$imagen->move(WRITEPATH . 'uploads', $imagenName);
		} else {
		 $imagenName = null;
		}

		$user = $this->person->where('email', $email)->first();

		if($user) {
			return $this->response->setJSON([
				'status' => 'error',
				'message' => 'Данный пользователь уже существует'
			])->setStatusCode(409);
		} else {
			$this->person->insert([
				'name' => $name, 
				'email' => $email, 
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'secret' => $secret,
				'role' => $role,
				'imagen' => $imagenName
			]);
		}

		return $this->response->setJSON([
			'status' => 'Регистрация выполнена'
		])->setStatusCode(201);
	}
}