<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(false);

$routes->options('(:any)', function() {
    $response = service('response');
    return $response->setStatusCode(200)
                    ->setHeader('Access-Control-Allow-Origin', '*')
                    ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE')
                    ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Request-with')
                    ->setBody('');
});

$routes->get('/', 'TestController::index');

//proxy
$routes->get('/proxy/rates', 'ProxyController::fetchRates');
// tagsFilter
$routes->get('/tags/(:any)', 'TagsController::getTag/$1');
// newsNavigation
$routes->get('/news/navigation/(:num)', 'NavigateNewsController::getNavigation/$1');

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
    
    // persons
    $routes->resource('person', ['controller' => 'PersonController']);
});



