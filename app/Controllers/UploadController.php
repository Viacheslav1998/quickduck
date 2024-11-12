<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\NewsModel;


class UploadController extends ResourceController
{

  // public $image = '';

  public function create()
  {
    $image = $this->request->getFile('path_to_image');

    if ($image && $image->isValid() && !$image->hasMoved()) {
      $filePath = WRITEPATH . '../public/images';
      $newName = $image->getRandomName();
      $image->move($filePath, $newName);

      return $this->respond([
        'status' => 'success',
        'url' => base_url("images/$newName")
      ]);
    }

    return $this->fail('Ошибка загрузки изображения.');
  }


  public function updateImage($id)
  {
  	$model = new NewsModel();

  	// get current news
  	$newsItem = $model->find($id);
  	if (!$newsItem) {
  		return $this->response->setStatusCode(404, 'Новость не найдена');
  	}

  	// check download image
  	if ($this->request->getFile('image')->isValid()) {
  		// delete old image
  		// возможно нужно будет использовать WRITEPATH
  		if ($newsItem['path_to_image'] && file_exists(FCPATH . $newsItem['path_to_image'])) {
  			unlick(FCPATH . $newsItem['path_to_image']);
  		}

  		// download new image
  		$image = $this->request->getFile('image');
  		$newImagePath = $image->store('uploads/news_images');
  		$newsItem['path_to_image'] = $newImagePath;

  		// update val
  		$model->update($id, ['path_to_image' => $newImagePath]);

  		return $this->response->setJSON(['message' => 'Изображение обновлено успешно']);
  	}

  	return $this->response->setStatusCode(400, 'Не удалось обновить изображение');
  }

}

