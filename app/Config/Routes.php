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
    // news
    $routes->resource('news', ['controller' => 'NewsController']);
    $routes->options('news/(:num)', 'NewsController::preflight');

    // imagen news
    $routes->resource('upload-image', [
    	'controller' => 'UploadController',
    	'only' => ['create'],
    ]);

    // upload
    $routes->post('update-imagen/(:num)', 'UploadController::updateImage/$1');
    $routes->post('current-update-image/(:num)', 'UploadController::currentUpdateImage/$1');
    
    // persons
    $routes->resource('person', ['controller' => 'PersonController']);
    // $routes->options('person/(:num)', ['controller' => 'PersonController::preflight']);

    // tags
    $routes->resource('tags', ['controller' => 'TagsController']);
});

//proxy
$routes->get('/proxy/rates', 'ProxyController::fetchRates');


