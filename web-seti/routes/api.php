<?php

use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 *  @var Router $router
 */
Auth::routes();

$router->post('/register','AuthController@register');
$router->post('/login','AuthController@login');

$router->middleware('auth:api')->group(function() use ($router) {
    $router->post('tutor/create', 'TutorController@create');
});
