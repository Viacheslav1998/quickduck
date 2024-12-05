<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProxyController extends BaseController
{
    public function fetchRates()
    {
    	// remote resource
        $remoteUrl = 'https://nationalbank.kz/rss/rates_all.xml';

        // Initialization CURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $remoteUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // data collection verification
        if ($httpCode === 200 && $data) {
        	return $this->response
        	  ->setHeader('Content-type', 'application/xml')
        	  ->setHeader('Access-Control-Allow-Origin', '*')
        	  ->setBody($data);
        }

        // if error 
        return $this->response
          ->setStatusCode(ResponseInterface::HTTP_BAD_GATEWAY)
          ->setBody('Не удалось получить данные с удаленного ресурса');
    }
}
