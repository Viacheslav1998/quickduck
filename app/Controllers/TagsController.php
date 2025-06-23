<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\BaseController;

class TagsController extends BaseController
{
	protected $modelName = \App\Models\NewsModel::class;
	protected $format = 'json';

  /**
   * Get news by tags
   * return 
   * @param Array
   */
	public function tagsFilter($tag = '', $perPage = 5) 
	{

		$news = $this->model
		    ->like('tags', $tag, 'both')
		    ->paginate($perPage);

		$pager =  \Config\Services::pager();

		return [
			'data' => $news, 
			'pagination' => [
				'currentPage' => $model->pager->getCurrentPage(),
				'perPage'     => $model->pager->getPerPage(),
				'total'       => $model->pager->getTotal(),
				'pageCount'   => $model->pager->getPageCount()
			]
		]; 
	} 

	/**
	 * Get news by tags
     * return  
     * @param JSON
     */
	public function getTag($tag)
	{
		$page = $this->request->getGet('page') ?? 1;
		$news = $this->tagsFilter($tag, 5);
		return $this->response->setJSON($news);
	}


}
