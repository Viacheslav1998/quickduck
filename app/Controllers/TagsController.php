<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TagsController extends BaseController
{
   /**
    * Get news by tags
	* return json
	*/
	public function tagsFilter($id = null) 
	{
		$data = [
			"name" => $id,
			"desk" => "Just description"
		];
		return $data;
	}
}
