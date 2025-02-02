<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TestModel;
use CodeIgniter\HTTP\ResponseInterface;


class TestController extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new TestModel();
    }

    public function index()
    {
        // Заголовок
        $title = "Тут нет никакой графической информации";

        // Текст для параграфа
        $text = "Получайте данные через REST API";

        // Формируем строку с контентом
        $content = "<h1 style='text-align: center;'>{$title}</h1>";
        $content .= "<p style='text-align: center;'>{$text}</p>";

        // Выводим контент
        echo $content;
    }
}
