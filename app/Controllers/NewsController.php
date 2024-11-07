<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\NewsModel;

class NewsController extends ResourceController
{
    protected $modelName = 'App\Models\NewsModel';
    protected $format = 'json';

    /**
    * Config CORS
    */
    public function handleOptions()
    {
        return $this->response
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
            ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization')
            ->setStatusCode(200);
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
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $model = new NewsModel();

        // get post data
        $data = [
            'name' => $this->request->getPost('name'),
            'title' => $this->request->getPost('title'),
            'desk' => $this->request->getPost('desk'),
            'path_to_image' => $this->request->getPost('path_to_image')
        ];

        // save and response
        if ($model->insert($data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Данные успешно добавлены.'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Ошибка при добавлении данных.'
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
        //
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
          return $this->respond([
            'status' => 'error',
            'message' => 'Новость не найдена',
          ], 404);
        }

        if (!empty($news['path_to_image'])) {
          $imagePath = FCPATH . 'images/' . $news['path_to_image'];

          if (file_exists($imagePath)) {
            unlink($imagePath);
          } else {
            log_message('error', 'Изображение не найдено: ' . $imagePath);
          }
        }

        $this->model->delete($id);

        return $this->respond([
          'status' => 'success',
          'message' => 'Новость Удалена без проблем!' 
        ], 200);
    }

}
