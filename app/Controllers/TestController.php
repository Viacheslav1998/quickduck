<?php

namespace App\Controllers;

use CodeIgniter\Controller;

/**
 * just for the sake of understanding
 */
class TestController extends BaseController
{

	public function test(): string
	{
		return '123';
	}

	public function getData() {
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
}
