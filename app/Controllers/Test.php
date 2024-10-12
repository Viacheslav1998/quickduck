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
        $data = $this->model->getTestData();
        return view('pages/test', $data);
    }
}
