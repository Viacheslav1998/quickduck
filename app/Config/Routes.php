<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'TestController::index');

//proxy
$routes->get('/proxy/rates', 'ProxyController::fetchRates');
// tagsFilter
$routes->get('/tags/(:any)', 'TagsController::getTag/$1');
// newsNavigation
$routes->get('/news/navigation/(:num)', 'NavigateNewsController::getNavigation/$id');

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
});



