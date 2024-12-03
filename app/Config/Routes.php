<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'TestController::index');
$routes->get('/test', 'TestController::test');
$routes->get('/test-data', 'TestController::testJson');

// Api CRUD
$routes->group('api', ['filter' => 'cors'], static function (RouteCollection $routes): void {
    $routes->resource('news', ['controller' => 'NewsController']);
    $routes->options('news/(:any)', 'NewsController::handleOptions');
    $routes->options('update-imagen/(:num)', 'UploadController::handleOptions');

    $routes->resource('upload-image', [
    	'controller' => 'UploadController',
    	'only' => ['create'],
    ]);

    $routes->post('update-imagen/(:num)', 'UploadController::updateImage/$1');
});




