<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use CodeIgniter\HTTP\ResponseInterface;

class NavigateNewsController extends BaseController
{
    
	/**
	* get prev | next 
	* return JSON
	*/
    public function getNavigation($id)
    {
    	$model = new NewsMode();

    	$nextNews = $model->getNext($id);
    	$prevNews = $model->getPrevious($id);

    	return $this->response->setJSON([
    		'next' =>  $nextNews ?? null,
    		'prev' => $prevNews ?? null,
    	]);
    }
}
