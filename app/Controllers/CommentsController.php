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
    	$data = $this->request->getJSON(true);
    	// log_message('debug', 'received comment data:' . print_r($data, true));
    
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
