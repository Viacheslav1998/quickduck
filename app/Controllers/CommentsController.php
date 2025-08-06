<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommentsModel;
use CodeIgniter\HTTP\ResponseInterface;

class CommentsController extends BaseController
{
	protected $model;
	protected $format = 'json';

	public function __construct()
	{
	    $this->model = new CommentsModel();
	}

    public function index()
    {
        // why?
    }

    public function store()
    {
    	$data = [
    		'post_name' => $this->request->getPost('post_name'),
    		'person_name' => $this->request->getPost('person_name'),
    		'comment' => $this->request->getPost('comment'),
    		'user_id' => $this->request->getPost('user_id'),
    		'post_id' => $this->request->getPost('post_id'),
    		'status' => $this->request->getPost('status'),
    		'reaction' => $this->request->getPost('reaction')
    	];

    	$comments = $this->model->insert($data);

    	if ($comments) {
    		return $this->response->setJSON([
    			'status' => 'success',
    			'message' => 'Комментарий создан и отправлен на модерацию!' 
    		]);
    	}

    	return $this->response->setJSON([
    		'status' => 'error',
    		'message' => 'Ошибка: не удалось записать комментарий!'
    	])->setStatusCode(400);
    }


}
