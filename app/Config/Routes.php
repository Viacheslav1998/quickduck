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

$routes->group('', ['filter' => 'cors'], static function (RouteCollection $routes): void {
   $routes->resource('news');
    $routes->options('news', static function () {
        // Implement processing for normal non-preflight OPTIONS requests,
        // if necessary.
        $response = response();
        $response->setStatusCode(204);
        $response->setHeader('Allow:', 'OPTIONS, GET, POST, PUT, PATCH, DELETE');

        return $response;
    });
});
// $routes->resource('news');

