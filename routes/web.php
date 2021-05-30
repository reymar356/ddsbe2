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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users',['uses' => 'BlogController@getUsers']);

});


$router->get('/users', 'BlogController@index');
$router->post('/users', 'BlogController@add');
$router->get('/users/{id}', 'BlogController@show');
$router->put('/users/{id}', 'BlogController@update');
$router->patch('/users/{id}', 'BlogController@update');
$router->delete('/users/{id}', 'BlogController@delete');


$router->get('/userjob', 'UserJobController@index'); 
$router->get('/userjob/{id}','UserJobController@show');