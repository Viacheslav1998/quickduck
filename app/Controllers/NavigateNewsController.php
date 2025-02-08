<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use CodeIgniter\HTTP\ResponseInterface;

class NavigateNewsController extends BaseController
{
    
	/**
	 * Retrieves the previous and next news posts based on the given ID.
	 *
	 * @param int $id The current news post ID.
	 * @return \CodeIgniter\HTTP\Response JSON response containing:
	 *         - 'prev' => array|null (Previous post data or null if not found)
   *         - 'next' => array|null (Next post data or null if not found)
	 */
  public function getNavigation($id)
  {
  	$model = new NewsModel();

  	$nextNews = $model->getNext($id);
  	$prevNews = $model->getPrevious($id);

  	return $this->response->setJSON([
  		'next' => $nextNews,
  		'prev' => $prevNews
  	]);	
  }


}
