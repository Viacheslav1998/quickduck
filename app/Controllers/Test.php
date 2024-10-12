<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TestModel;
use CodeIgniter\HTTP\ResponseInterface;


class Test extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new TestModel();
    }

    public function index()
    {
        $data = $this->model->getData();
    }

    public function test() {
        $data = [
            'tdata' => $this->model->getDataExample1()
        ];
        return view('pages/test', $data);
    }

    public function testJson()
    {
        $data = $this->model->getJsonTestData();
        return $this->response->setJSON($data);
    }
}
