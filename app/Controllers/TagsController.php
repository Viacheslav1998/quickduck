<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;

class TagsController extends BaseController
{

	protected $db;

  /**
   * get a model anywhere
   */ 
  public function __construct() 
  {
  	$this->db = \Config\Database::connect();
  }

  /**
   * Get news by tags
	 * return 
	 * @param Array
	 */
	public function tagsFilter($tag = '') 
	{
		$builder = $this->db->table('news');

		$query = $builder->like('tags', $tag, 'both')->get();
		$articles = $query->getResult();

		if (empty($articles)) {
			return $errors = [
				"Ошибка", "Не найдено новостей по тегу $tag"
			];
		}

		return $articles;
	} 

	/**
	 * Get news by tags
   * return  
   * @param JSON
   */
	public function getTag($tag)
	{
		$news = $this->tagsFilter($tag);
		return $this->response->setJSON($news);
	}


}
