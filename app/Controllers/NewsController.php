<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\NewsModel;

class NewsController extends ResourceController
{
    protected $modelName = 'App\Models\NewsModel';
    protected $format = 'json';

    public function __construct() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        // Обработка preflight запросов
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            http_response_code(200);
            exit;
        }
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
          return $this->failNotFount('Пост не найден');   
        }

        if ($news['path_to_image']) {
          $imagePath = WRITEPATH . '../public/images/' . $news['path_to_image'];
          if (file_exists($imagePath)) {
            unlink($imagePath);
          }
        }

        $news->delete($id);

        return $this->respond(
          [
            'status' => 'успешно',
            'Message' => 'Новость Удалена без проблем!' 
          ]
        );
    }

    /**
    * Config Handlers
    */
    public function options()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        header('Access-Control-Max-Age: 86400');

        return $this->response->setStatusCode(200);
    }


}
