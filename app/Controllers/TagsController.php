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
	 * return json
	 */
	public function tagsFilter($tag = '') 
	{
		$builder = $this->db->table('news');
		$query = $builder->like('tags', $tag, 'both')->get();
		$articles = $query->getResult();
		dd($articles);
	}

	/**
   * Filter tags = $tags
   * return  
   * @param Array
   */
	public function getTestTags()
	{
		
	}    

	/**
   * return  
   * @param JSON
   */
	public function getFilter()
	{

	}


}
