<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\PersonModel;

class PersonController extends BaseController
{
  protected $modelName 'App\Models\PersonModel';
  protected $format = 'json';


/**
 * Create a new resource object, Person
 *
 * @return ResponseInterface
 */
public function create()
{
	$model = new PersonModel;

	// get person data
	// email, password, secret = null
	$data = [
		'name' => $this->request->getPost('name'),
		'email' => $this->request->getPost('email'),
		'password' => $this->request->getPost('password'),
		'secret' => $this->request->getPost('secret')
	];

	dd($data);
}
  

}
