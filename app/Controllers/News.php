<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

use App\Models\NewsModel;

/**
*  получение данных через fetch работает CORS настроен
 * но сохранение POST не работает хотя тоже много вариантов пробувал с cors где его только нет
 * ПОлучается что сохраняю я данные через статичный action
 * сохраняю их url ='news/add' backend
 * через action="http://quickduck/news/add" frontEnd
 * данные сейвятся но не сейвятся через ajax
 * ответ (успех/провал) я просто возвращаю в виде json для отображение
*/
class News extends ResourceController
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

        // Получаем данные из POST-запроса
        $data = [
            'name' => $this->request->getPost('name'),
            'title' => $this->request->getPost('title'),
            'desk' => $this->request->getPost('desk')
        ];

        // Вставляем данные в таблицу
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
        //
    }

    public function options()
    {
        // Устанавливаем заголовки CORS для preflight-запроса
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        header('Access-Control-Max-Age: 86400');

        // Возвращаем успешный ответ
        return $this->response->setStatusCode(200);
    }


}
