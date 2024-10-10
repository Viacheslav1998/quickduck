<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;

/**
 * just for the sake of understanding
 */
class TestController extends BaseController
{

    use ResponseTrait;

	public function test(): string
	{
		return '123';
	}

	public function getData()
    {
      // database connect
      $db = \Config\Database::connect();
      // exec
      $builder = $db->table('test');
      $query = $builder->get(); // get all data
      // get result
      $result = $query->getResult();

      // outrun
        foreach ($result as $row) {
            echo "ID: " . $row->id . "<br>";
            echo "Name: " . $row->name . "<br>";
            echo "Title: " . $row->title . "<br>";
            echo "Description: " . $row->desk . "<br><br>";
        }
    }

    public function home()
    {
        return view('pages/test.php');
        // создать модель
        // обьект модели -> получить данные  и вернуть данные в json формате
        // не забудь юзнуть бд

        //$model = new TestModel();

        //$datas = $model->findAll();

        //return $this->respond($datas);
        
    }
}
