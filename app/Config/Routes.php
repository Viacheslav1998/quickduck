<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */

// $routes->setAutoRoute(false);


$routes->get('/', 'TestController::index');
//proxy
$routes->get('/proxy/rates', 'ProxyController::fetchRates');
// news tags filters
$routes->get('/api/news/tags', 'TagsController::getTag');
// single news nagivation tabs
$routes->get('/news/navigation/(:num)', 'NavigateNewsController::getNavigation/$1');

// user/person 
$routes->get('/auth/login', 'AuthController::login');
$routes->post('/auth/register', 'AuthController::register');

// Api CRUD
$routes->group('api', ['filter' => 'cors'], static function (RouteCollection $routes): void {
    // news
    $routes->resource('news', ['controller' => 'NewsController']);

    // imagen news
    $routes->resource('upload-image', [
    	'controller' => 'UploadController',
    	'only' => ['create'],
    ]);

    // upload
    $routes->post('update-imagen/(:num)', 'UploadController::updateImage/$1');
    $routes->post('current-update-image/(:num)', 'UploadController::currentUpdateImage/$1');
    
    // // persons
    // $routes->resource('person', ['controller' => 'PersonController']);
});



