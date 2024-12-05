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
        curl_close($ch);

        // data collection verification

    }
}
