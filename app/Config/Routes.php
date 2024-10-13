<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//$routes->resource('api/test');
//$routes->resource('test');
//$routes->get('api/test', 'TestController::index');
$routes->get('/', 'Test::index');
$routes->get('/test', 'Test::test');
$routes->get('test-data', 'Test::testJson');
// Api CRUD
$routes->resource('news');

