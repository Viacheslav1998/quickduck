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


	/**
	* get all comments
	*/
    public function index()
    {
    	$data = $this->model->findAll();
    	print_r($data);
    	// log_message('debug', 'getting data:'. print_r($data, true));
    }

    /**
    * add a comment if one does not exits
    * needed to refactor!!!
    */
    public function store()
    {
    	// get data
    	$current_user_id = $this->request->getJSON(true)['user_id'] ?? null;
    	$post_id = $this->request->getJSON(true)['post_id'] ?? null;

    	// data availability check
    	if (!$current_user_id || !$post_id) {
    		return $this->response->setJSON([
    			'error' => 'не указан user_id или post_id'
    		]);
    	}

    	//  We are executing a request to check for the presence of a comment.
    	$comment_count = $this->model
    	                      ->where('user_id', $current_user_id)
    	                      ->where('post_id', $post_id)
    	                      ->countAllResults();

    	// Did the user leave a comment?       
        if ($comment_count > 0) {
        	return $this->response->setJSON([
        		'message' => 'Вы уже оставили свой комментарий к данному посту!'
        	]);
        }  

    	$data = $this->request->getJSON(true);
    
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
