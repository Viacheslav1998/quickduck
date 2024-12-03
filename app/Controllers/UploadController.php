<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\NewsModel;


class UploadController extends ResourceController
{

  public $image = '';

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

    $this->response->setHeader('Content-Type', 'application/json; charset=utf-8');

  	if (!$newsItem) {
  		return $this->response->setJSON([
        'message' => 'Новость не найдена'
      ])->setStatusCode(400);
  	}

    // get old file
    $file = $this->request->getFile('path_to_file');
    if ($file && $file->isvalid()) {
      
      // rm old file
      if (!empty($newsItem['path_to_image']) && file_exists(FCPATH . $newsItem['path_to_image'])) {
        unlink(FCPATH . $newsItem['path_to_image']);
      }

      // save new file
      $newImagePath = $file->store('uploads/news_images');
      $model->update($id, ['path_to_image' => $newImagePath]);

      return $this->response->setJSON([
        'message' => 'изображения успешно обновлено'
      ])->setStatusCode(200);
    }

    return $this->response->setJSON([
      'error' => 'Не удалось обновить изображение. Проверьте корректность данных.'
    ])->setStatusCode(400);
  }


  // public function updateImage($id)
  // {
  //   log_message('debug', 'FILES: ' . json_encode($_FILES));
  //   log_message('debug', 'POST: ' . json_encode($this->request->getPost()));

  //   $file = $this->request->getFile('path_to_image');
  //   if (!$file || !$file->isValid()) {
  //     log_message('error', 'Файл отсутствует или невалиден.');
  //     return $this->response->setStatusCode(400, 'Не удалось обновить изображение');
  //   }

  //   // Остальная логика...
  // }


}

