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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group (['middleware'=>'client.credentials'],function () use ($router){
    $router->get('/authors','AuthorController@index');
    $router->post('/authors','AuthorController@store');
    $router->post('/authors/{id}','AuthorController@show');
    $router->put('/authors/{id}','AuthorController@update');
    $router->delete('/authors/{id}','AuthorController@destroy');
    $router->get('/users','UserController@index');
    $router->post('/users','UserController@store');
}

);


$router->group(['middleware'=>'auth:api'],function () use ($router){
    $router->get('/users/me','UserController@me');
}
);




