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

	// Person data
	$data = [
		'name' => $this->request->getPost('name'),
		'email' => $this->request->getPost('email'),
		'password' => $this->request->getPost('password'),
		'secret' => $this->request->getPost('secret')
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

	// created_at изза колонок возможно их нет в таблице потому что а в model указано. пока мысли
}
  

}
