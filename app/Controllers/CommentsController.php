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
    * needed to a little bit refactor
    */
    public function store()
    {

    	$data = $this->request->getJSON(true);

    	$validation_result = $this->model->validateCommentData($data);
    	if ($validation_result !== true) {
    		return $this->response->setJSON([
    			'error' => $validation_result
    		]);
    	}

    	$comment_count = $this->model->getCommentCount($data['user_id'], $data['post_id']);
    	if ($comment_count > 0) {
    		return $this->response->setJSON([
    			'message' => 'Вы уже оставляли комментарий на эту новость'
    		]);
    	}

    	$insert_result = $this->model->insertComment($data);
    	if ($insert_result) {
    		return $this->response->setJSON([
    			'status' => 'success',
    			'message' => 'Комментарий создан и отправлен на модерацию'
    		]);
    	}

    	return $this->response->setJSON([
    		'status' => 'error',
    		'message' => 'Ошибка: не удалось записать комментарий'
    	])->setStatusCode(400);
    }


    /**
    * getting only current comment
    */
    public function getComment()
    {
    	$data = $this->request->getJSON(true);
    	$user_id = $data['user_id'] ?? null;
    	$post_id = $data['post_id'] ?? null;

    	$validation_result = $this->model->validateStaff($data);
    	if ($validation_result !== true) {
    		return $this->response->setJSON([
    			'error' => $validation_result
    		]);
    	}

    	$comment = $this->model->getCommentByUserAndPost($user_id, $post_id);

    	var_dump($comment);

    	die();

    	if ($comment) {
    		return $this->response->setJSON([
    			'status' => 'success',
    			'comment' => $comment
    		]);
    	}

    	return $this->response->setJSON([
    		'status' => 'error',
    		'message' => 'Комментарий не найден'
    	])->setStatusCode(404);
    }

}
