<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//$routes->resource('api/test');
//$routes->resource('test');
$routes->get('api/test', 'TestController::index');
$routes->get('/test', 'TestController::getData');
