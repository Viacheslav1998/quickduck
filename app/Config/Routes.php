<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Test::index');
$routes->get('/test', 'Test::test');
$routes->get('/test-data', 'Test::testJson');
// Api CRUD
$routes->options('api/news', 'News::options');

$routes->group('api', ['filter' => 'cors'], static function (RouteCollection $routes): void {
    $routes->resource('news');
    $routes->options('news', static function () {
        return service('response')->setStatusCode(204);
    });
    $routes->options('news/(:any)', static function () {
        return service('response')->setStatusCode(204);
    });
});





