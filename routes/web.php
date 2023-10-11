<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Users
$router->post('register', "AuthController@register");
$router->post('login', "AuthController@login");

$router->group(['prefix' => '/user', "middleware" => App\Http\Middleware\CorsMiddleware::class, "middleware" => 'auth'], function () use ($router) {
    $router->get('/list', 'AuthController@listUser');
});

$router->group(['prefix' => '/client', "middleware" => App\Http\Middleware\CorsMiddleware::class, "middleware" => 'auth'], function () use ($router) {
    $router->get('/list', 'ClientController@list');
});

$router->group(['prefix' => '/product', "middleware" => App\Http\Middleware\CorsMiddleware::class, "middleware" => 'auth'], function () use ($router) {
    $router->get('/list', "ProductController@list");
});

$router->group(['prefix' => '/areas', "middleware" => App\Http\Middleware\CorsMiddleware::class, "middleware" => 'auth'], function () use ($router) {
    $router->get('/list', "AreaController@list");
});

$router->group(['prefix' => '/inventory', "middleware" => App\Http\Middleware\CorsMiddleware::class, "middleware" => 'auth'], function () use ($router) {
    $router->get('/list', "InventoryController@list");
});