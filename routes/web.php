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


/** @var \Laravel\Lumen\Routing\Router $router */
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/api/login', 'TokenController@generate');

$router->group(['prefix' => '/api' , 'middleware' => 'JWT'], function () use ($router) {

    $router->group(['prefix' => '/serie'], function () use ($router) {
        $router->post('', 'SeriesController@store');
        $router->get('{id}', 'SeriesController@show');
        $router->put('{id}/nome', 'SeriesController@edit');
        $router->delete('{id}', 'SeriesController@destroy');

        $router->get('{serie_id}/episodios', 'EpisodiosController@buscaPorSerie');
    });
    $router->get('/series', 'SeriesController@index');

    $router->group(['prefix' => '/episodio'] , function () use ($router) {
        $router->post('','EpisodiosController@store');
        $router->get('{id}', 'EpisodiosController@show');
        $router->put('{id}/nome', 'EpisodiosController@edit');
        $router->delete('{id}', 'EpisodiosController@destroy');
    });
    $router->get('/episodios', 'EpisodiosController@index');
});
