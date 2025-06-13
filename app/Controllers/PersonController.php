<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;


class PersonController extends ResourceController 
{
  protected $modelName = \App\Models\PersonModel::class;
  protected $format = 'json';

	/**
	 * Create a new resource object, Person
	 *
	 * @return ResponseInterface
	 */
	public function create()
	{
		$password = $this->request->getPost('password');

		$data = [
			'name' => esc($this->request->getPost('name')),
			'email' => esc($this->request->getPost('email')),
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'secret' => esc($this->request->getPost('secret')),
		];

		$person = $this->model->insert($data);

		if ($person) {
         	return $this->respond([
	           'status' => 'success',
	           'message' => 'Пользователь зарегестрирован',
	        ]);
        } 

        return $this->respond([
		    'status' => 'error',
		    'message' => 'Ошибка: пользователь не зарегистрирован',
		    'errors' => $this->model->errors(), 
		], 400);
	}
	  

}
