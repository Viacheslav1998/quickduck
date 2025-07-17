<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TestRegularExpressionsController extends BaseController
{
	/**
	* Looking for a coincidence with the template in the line.
	*/
	public function testPregMatch()
	{
		$pattern = "/\d+/";
		$text = "какой то пример - из пяти яблок не найдено ничего";
		
		if (preg_match($pattern, $text, $matches)) {
			$message = "найдено совпадение " . $matches[0];
		    return $this->response->setJSON($message);
		}

		return $this->response->setJSON("nothing a special"); 

	}

	public function testPregMatchAll()
	{
		$pattern = "/\w+/";
		$text = "PHP A WERY cool";
		preg_match_all($pattern, $text, $matches);
		return $this->response->setJSON($matches[0]);
	}

	public function testResponseMessage()
	{
		$body = "message you can see right now!!";
		// return $this->response->setStatusCode(200)->setBody($body);
		// return $this->response->setStatusCode(404, $body); // сообщение рядом с кодом ответа будет 200 your message
		// return $this->response->setJSON($body);
		// return $this->response->setStatusCode(200)->setJSON($body);
		// return $this->response->setXML($body);

		// return redirect()->to('/');

		// $name = 'text.txt';
		// return $this->response->download($name, $body)->inline();

		// $response = $this->response->setStatusCode(201);
		// $message = $response->getStatusCode();
		// return $this->response->setXML($message);
	}

    /**
	* Replaces the coincidences found.
	*/
	public function testPregReplace()
	{
		$pattern = "/\s+/";
		$replacement = "-";
		$text = "hello world";
		$result = preg_replace($pattern, $replacement, $text);
		return $this->response->setJSON($result);
	}

	/**
	* It breaks the line according to regular expression.
	*/
	public function testPregSplit()
	{
		$pattern = "/[\s,]+/";
		$text = "Машина, ехала_в сторону, ОуйшенБич";
		$fruits = preg_split($pattern, $text);
		return $this->response->setJSON($fruits);
	}

	public function testPregReplaceCallback()
	{
		$text = "Цены: 100, 200, 300";
		$result = preg_replace_callback('/\d+/', function($match) {
			return $match[0] * 2;
		}, $text);

		return $this->response->setJSON($result);
	}


	 // Часто используемые шаблоны (регулярки)
	 // Назначение	 Шаблон	 Пример
	 // Числа 	 /\d+/	123
	 // Буквы  латиницы	/[a-zA-Z]+/	abcXYZ
	 // Email	 /^[\w.-]+@\w+\.\w+$/	test@example.com
	 // Телефон  (простой)	/^\+?\d{10,15}$/	+79991234567
	 // HTML-теги	 /<[^>]+>/	<p>текст</p>


	// 🧪 Флаги регулярных выражений
	// Флаги указываются после закрывающего слэша: '/pattern/i'
	// Флаг	Назначение
	// i	Нечувствительно к регистру
	// u	Юникод-совместимость
	// s	. включает \n
	// m	Многострочный режим
}