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

  // currently unused
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


  // only test method
  public function customUploadImage() {
    $file = $this->request->getFile('path_to_image');

    if ($file && $file->isValid()) {

      // если что проблема может быть в путях сохранения картинки 
      $newImagePath = $file->store('uploads/news_images');

      return $this->response->setJSON([
        'message' => 'Успешно загружен',
        'path_to_image' => $newImagePath,
      ]);
    }
    return $this->response->setStatusCode(400, 'Ошибка при загрузке файла');
  }



  // if ($image && $image->isValid() && !$image->hasMoved()) {
  //   $filePath = WRITEPATH . '../public/images';
  //   $newName = $image->getRandomName();
  //   $image->move($filePath, $newName);

  //   return $this->respond([
  //     'status' => 'success',
  //     'url' => base_url("images/$newName")
  //   ]);

  public function currentUpdateImage($id) {
    $model = new NewsModel();

    //current news 
    $newsItem = $model->find($id);
    
    if (!$newsItem) {
      return $this->response->setStatusCode(404, 'новость не найдена');
    }

    $file = $this->request->getFile('path_to_image');

    if ($file && $file->isValid() && !$file->hasMoved()) {
      // delete the old file if it exists
      if (!empty($newsItem['path_to_image'])) {
        $oldFilePath = str_replace(base_url(), FCPATH, $newsItem['path_to_image']);
        if (file_exists($oldFilePath)) {
          unlink($oldFilePath);
        }
      }
      // Unique name
      $newFileName = $file->getRandomName();

      // path images
      $file->move(FCPATH . 'images', $newFileName);

      // fullPath
      $absoluteUrl = base_url('images/' . $newFileName);

      // save string
      $model->update($id, ['path_to_image' => $absoluteUrl]);

      return $this->response->setJSON([
        'message' => 'Изображение успешно обновлено',
        'path_to_image' => $absoluteUrl,
      ]);
    }
    
    return $this->response->setJSON([
      'message' => 'файл не выбран. Старая картинка сохранена',
      'path_to_image' => $newsItem['path_to_image'],
    ]);
  }

}

