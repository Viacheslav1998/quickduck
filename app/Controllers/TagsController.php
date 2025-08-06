<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use CodeIgniter\HTTP\ResponseInterface;

class TagsController extends BaseController
{
    protected $model;
    protected $format = 'json';

    public function __construct()
    {
        $this->model = new NewsModel();
    }

    /**
     * @param string $tag
     * @param int $perPage
     * @return array
     */
	public function tagsFilter($tag = '', $perPage = 5) 
	{
		$page = $this->request->getGet('page') ?? 1;

		$news = $this->model
		    ->like('tags', $tag, 'both')
		    ->paginate($perPage, 'default', $page);

		$pager = $this->model->pager;

		return [
			'data' => $news, 
			'pagination' => [
				'currentPage' => $pager->getCurrentPage(),
				'perPage'     => $pager->getPerPage(),
				'total'       => $pager->getTotal(),
				'pageCount'   => $pager->getPageCount()
			]
		]; 
	} 

	/**
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
	public function getTag()
	{
		$tag = $this->request->getGet('tags');

		if (!$tag) {
			return $this->response->setJSON([
				'error' => 'Ошибка тега'
			])->setStatusCode(400);
		}

		$data = $this->tagsFilter($tag);
		return $this->response->setJSON($data);
	}

}
