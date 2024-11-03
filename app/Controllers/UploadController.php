<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class UploadController extends ResourceController
{

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
}

