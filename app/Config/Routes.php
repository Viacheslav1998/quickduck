<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(false);

$routes->options('/auth/(:any)', function () {
    return service('response')
      ->setStatusCode(200)
      ->setHeader('Access-Control-Allow-Origin', '*')
      ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
      ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Request-With')
      ->setBody('');
});


$routes->get('/', 'TestController::index');
//proxy
$routes->get('/proxy/rates', 'ProxyController::fetchRates');
// news tags filters
$routes->get('/api/news/tags', 'TagsController::getTag');
// single news nagivation tabs
$routes->get('/news/navigation/(:num)', 'NavigateNewsController::getNavigation/$1');

// user/person 
$routes->post('/auth/login', 'Auth::login');
$routes->post('/auth/register', 'Auth::register');
// auth api
$routes->get('/api/me', 'Auth::me');

// Api CRUD Resources
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
});



