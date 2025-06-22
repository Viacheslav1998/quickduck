<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;


class NewsController extends ResourceController
{
  protected $modelName = \App\Models\NewsModel::class;
  protected $format = 'json';

  /**
   * Return an array of resource objects, themselves in array format.
   *
   * @return ResponseInterface
   */
  public function index()
  {
      // return $this->respond($this->model->findAll());

    $page = $this->request->getGet('page') ?? 1;
    $perPage = 10;

    $news = $this->model->paginate($perPage, 'default', $page);
    $pager = $this->model->pager;

    return $this->respond([
      'data' => $news,
      'pagination' => [
        'currentPage' => $pager->getCurrentPage(),
        'perPage' => $pager->getPerPage(),
        'total' => $pager->getTotal(),
        'pageCount' => $pager->getPageCount()
      ]
    ]);

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
      $news = $this->model->find($id);
      if (!$news) {
        return $this->failNotFound('Новость не найдена');
      }

      return $this->respond($news);
  }


  /**
   * Create News with tags
   *
   * @return ResponseInterface
   */
   public function create()
   {
     $data = [
         'name' => $this->request->getPost('name'),
         'title' => $this->request->getPost('title'),
         'desc' => $this->request->getPost('desc'), 
         'path_to_image' => $this->request->getPost('path_to_image'),
         'tags' => $this->request->getPost('tags')
     ];
    
     $news = $this->model->insert($data);

     if ($news) {
         return $this->respond([
           'status' => 'success',
           'message' => 'Новость успешно добавлена',
           'news_id' => $news,
        ]);
     } 

      return $this->respond([
          'status' => 'error',
          'message' => 'Ошибка: Новость не добавлена!',
          'errors' => $this->model->errors(), 
      ], 400);

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
        return $this->respond([
          'error' => 'Неверный запрос'
        ], 400);
      }

      if ($this->model->update($id, $data)) {
        return $this->respond([
          'message' => 'Новость успешно обновлена'
        ]);
      } else {
         log_message('error', 'Ошибка обновления новости с ID ' . $id . '. Данные: ' . json_encode($data));
        return $this->respond([
          'error' => 'Ошибки обновления'
        ], 500);
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
      $news = $this->model->find($id);

      if (!$news) {
        return $this->failNotFound('Новость не найдена');
      }

      if (!empty($news['path_to_image'])) {
        $imageName = basename($news['path_to_image']);
        $imagePath = FCPATH . 'images/' . $imageName;

        if (file_exists($imagePath)) {
          if (!unlink($imagePath)) {
            log_message('error', 'Не удалось удалить изображение: ' . $imagePath);
            return $this->respond([
              'status' => 'error',
              'message' => 'Не удалось удалить изображение',
            ], 500);
          }
        } else {
          log_message('error', 'Изображение не найдено: ' . $imagePath);
        }
      }

      if ($this->model->delete($id)) {
        return $this->respond([
          'status' => 'success',
          'message' => 'Новость успешно удалена',
        ], 200);
      } else {
        return $this->respond([
          'status' => 'error',
          'message' => 'Ошибка при удалении новости',
        ], 500);
      }
    }


}
