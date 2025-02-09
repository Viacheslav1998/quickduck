<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\NewsModel;

class NewsController extends ResourceController
{
  protected $modelName = 'App\Models\NewsModel';
  protected $format = 'json';

  public function preflight($id = null)
  {
    return $this->response->setHeader('Access-Control-Allow-Origin', '*')
          ->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
          ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With')
          ->setStatusCode(200)
          ->setJSON([]);
  }

  /**
   * Return an array of resource objects, themselves in array format.
   *
   * @return ResponseInterface
   */
  public function index()
  {
      return $this->respond($this->model->findAll());
  }


  /**
   * Return the properties of a resource object.
   *
   * @param int|string|null $id
   *
   * @return ResponseInterface
   */
  public function show($id = null)
  {
      return $this->respond($this->model->find($id));
  }

  /**
   * Return a new resource object, with default properties.
   *
   * @return ResponseInterface
   */
  public function new()
  {
      //
  }

  /**
   * Create a new resource object, from "posted" parameters.
   * Create News with tags
   *
   * @return ResponseInterface
   */
   public function create()
   {
     $newsModel = new NewsModel();

     $newsData = [
       'name' => $this->request->getPost('name'),
       'title' => $this->request->getPost('title'),
       'desk' => $this->request->getPost('desk'),
       'path_to_image' => $this->request->getPost('path_to_image'),
       'tags' => $this->request->getPost('tags')
     ];
    
     $news = $newsModel->insert($newsData);

     if ($news) {
       // success
       return $this->response->setJSON([
         'status' => 'success',
         'message' => 'Новость успешно добавлена',
         'news_id' => $news,
      ]);
     } else {
       // error
       return $this->response->setJSON([
         'status' => 'error',
         'message' => 'Ошибка при добавлении новости',
         'errors' => $newsModel->errors(),
       ]);
     }
    }



    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
      $data = $this->request->getJSON(true);
      if (!$data) {
        return $this->response->setStatusCode(400)->setJSON([
          'error' => 'Неверный запрос'
        ]);
      }

      $newsModel = new NewsModel();

      if ($newsModel->update($id, $data)) {
        return $this->response->setJSON([
          'message' => 'Новость успешно обновлена'
        ]);
      } else {
         log_message('error', 'Ошибка обновления новости с ID ' . $id . '. Данные: ' . json_encode($data));
        return $this->response->setStatusCode(500)->setJSON([
          'error' => 'Ошибки обновления'
        ]);
      }
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
      $newsModel = new NewsModel();

      // Поиск новости
      $news = $newsModel->find($id);

      if (!$news) {
        return $this->response->setJSON([
          'status' => 'error',
          'message' => 'Новость не найдена',
        ], 404);
      }

      // Удаление изображения, если оно существует
      if (!empty($news['path_to_image'])) {
        $imageName = basename($news['path_to_image']);
        $imagePath = FCPATH . 'images/' . $imageName;

        if (file_exists($imagePath)) {
          if (!unlink($imagePath)) {
            log_message('error', 'Не удалось удалить изображение: ' . $imagePath);
            return $this->response->setJSON([
              'status' => 'error',
              'message' => 'Не удалось удалить изображение',
            ], 500);
          }
        } else {
          log_message('error', 'Изображение не найдено: ' . $imagePath);
        }
      }

      // Удаление новости
      if ($newsModel->delete($id)) {
        return $this->response->setJSON([
          'status' => 'success',
          'message' => 'Новость успешно удалена',
        ], 200);
      } else {
        return $this->response->setJSON([
          'status' => 'error',
          'message' => 'Ошибка при удалении новости',
        ], 500);
      }
    }


}
