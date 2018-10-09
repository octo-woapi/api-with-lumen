<?php

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

// Root
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'v1'], function () use ($router) {
  // Root mirror
  $router->get('/', function() use ($router) {
    return $router->app->version();
  });

  // Products
  $router->get('/products', 'ProductController@index');

  $router->post('/products', 'ProductController@create');

  $router->get('/products/{id}', 'ProductController@show');

  $router->put('/products/{id}', 'ProductController@replace');

  $router->delete('/products/{id}', 'ProductController@remove');

  // Orders
  $router->get('/orders', 'OrderController@index');

  $router->post('/orders', 'OrderController@create');

  $router->put('/orders/{id}', 'OrderController@replace');

  $router->delete('/orders/{id}', 'OrderController@remove');

  // Bills
  $router->get('/bills', 'BillController@index');
});
