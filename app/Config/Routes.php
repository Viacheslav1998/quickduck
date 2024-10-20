<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Test::index');
$routes->get('/test', 'Test::test');
$routes->get('/test-data', 'Test::testJson');

// Api CRUD
$routes->group('api', ['filter' => 'cors'], static function (RouteCollection $routes): void {
    $routes->resource('news');
});





