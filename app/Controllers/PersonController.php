<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\PersonModel;

class PersonController extends ResourceController 
{
  protected $modelName = 'App\Models\PersonModel';
  protected $format = 'json';

/**
 * config CORS
 */
public function handleOptions()
{
	return $this->response
	  ->setHeader('Access-Control-Allow-Origin', '*')
	  ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
	  ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization')
	  ->setStatusCode(200);
}

/**
 * Get resource object, Persons
 *
 * @return ResponseInterface
 */
public function index() 
{
	/**/
}


/**
 * Create a new resource object, Person
 *
 * @return ResponseInterface
 */
public function create()
{
	$model = new PersonModel;

	$password = $this->request->getPost('password');

	// return JSON answer
	if (!$password) {
		return $this->response->setJSON([
			'status' => 'error',
			'message' => 'Пароль не может быть пустым.'
		]);
	}

	// Person data
	$data = [
		'name' => esc($this->request->getPost('name')),
		'email' => esc($this->request->getPost('email')),
		'password' => password_hash($password, PASSWORD_DEFAULT),
		'secret' => esc($this->request->getPost('secret')),
	];

	// save and response
	if ($model->insert($data)) {
		return $this->response->setJSON([
			'status' => 'success',
			'message' => 'Пользователь зарегестрирован.'
		]);
	} else {
		return $this->response->setJSON([
			'status' => 'error',
			'message' => 'Ошибка при регистрации.'
		]);
	}
}
  

}
