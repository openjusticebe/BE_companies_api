<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    redirect()->route('api.index');
});


// $router->get('/', [
//     'as' => 'api.base',
//     'uses' => 'Api\ApiController@index',
// ]);


// //  Routing
// $router->group(['prefix'=>'api/v1'], function () use ($router) {
//     $router->get('/', [
//         'as' => 'api.base_api',
//         'uses' => 'Api\BaseController@index',
//     ]);

//     $router->get('/sites/', [
//         'as' => 'api.sites.index',
//         'uses' => 'Api\SiteController@index',
//     ]);

//     $router->get('/sites/{id}', [
//         'as' => 'api.sites.show',
//         'uses' => 'Api\SiteController@show',
//     ]);

//     $router->get('/buildings/', [
//         'as' => 'api.buildings.index',
//         'uses' => 'Api\BuildingController@index',
//     ]);

//     $router->get('/buildings/{id}', [
//         'as' => 'api.buildings.show',
//         'uses' => 'Api\BuildingController@show',
//     ]);

//     $router->get('/logbook/', [
//         'as' => 'api.logbook.logbook',
//         'uses' => 'Api\LogbookController@logbook',
//     ]);

//     $router->get('/map/', [
//         'as' => 'api.map.map',
//         'uses' => 'Api\MapController@map',
//     ]);

//     $router->get('/indicators/', [
//         'as' => 'api.indicators.index',
//         'uses' => 'Api\IndicatorController@index',
//     ]);
// });
