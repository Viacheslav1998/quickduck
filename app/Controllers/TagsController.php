<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;

class TagsController extends BaseController
{

	protected $newsModel;

  /**
   * get a model anywhere
   */ 
  public function __construct() 
  {
  	$this->newsModel = new NewsModel();
  }

  /**
   * Get news by tags
	 * return json
	 */
	public function tagsFilter($id = null) 
	{
		

	}

	/**
   * return: 
   * @param JSON
   */
	public function getTestTags()
	{
		$query = $db->query("SELECT * FROM WHERE tags LIKE `%php%`");
		$results = $query->getResults();

		return $results;

		/// вот тут что то использовать что бы можно было like %php%
		// либо builder db либо object db
	}    

}
