<?php

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
    return redirect()->route('statistics');
});

Auth::routes();
Route::get('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

Route::get('v/{name?}', [
    'as' => 'view',
    function ($name) {
        return view($name);
    }
]);

Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);

    Route::get('view', function () {
        return view('control_panel.settings');
    });

    Route::post('user/save', [
        'as' => 'user.save',
        'uses' => 'UsersController@saveEmployer'
    ]);

    Route::group(['prefix'=>'site'],function (){
        //     Добавление сайтов
        Route::post('/',[
            'as'=>'site.create',
            'uses'=>'SiteController@create'
        ]);

        // Просмотр сайтов
        Route::get('/',[
            'as'=>'site.view',
            'uses'=>'SiteController@view'
        ]);

        // Блокировака сайта
        Route::post('block',[
            'as'=>'site.block',
            'uses'=>'SiteController@block'
        ]);
    });

    Route::group(['prefix' => 'logs'], function () {
        Route::group(['prefix' => 'squid'], function () {

        Route::match(['get', 'post'], 'test', 'SquidController@test');

        Route::match(['get', 'post'], 'view', [
            'as' => 'squid.view',
            'uses' => 'SquidController@viewSquidLog'
        ]);
            Route::get('test', [
                'as' => 'squid.test',
                'uses' => 'SquidController@test',
            ]);

            Route::match(['get', 'post'], 'log', [
                'as' => 'squid.log',
                'uses' => 'SquidController@viewSquidLog'
            ]);

            Route::post('restart', "SquidController@squidRestart");

            Route::post('update', [
                'as' => 'squid.update',
                'uses' => 'SquidController@updateTable'
            ]);
        });

        Route::group(['prefix' => 'apache'], function () {
            Route::get('test', [
                'as' => 'apache.test',
                'uses' => 'ApacheController@test',
            ]);

            Route::match(['get', 'post'], 'log', [
                'as' => 'apache.log',
                'uses' => 'ApacheController@view'
            ]);

            Route::post('update', [
                'as' => 'apache.update',
                'uses' => 'ApacheController@updateTable'
            ]);
        });

        Route::group(['prefix' => 'statistics'], function () {
            Route::get('/', [
                'as' => 'statistics',
                'uses' => 'LogsController@staticView'
            ]);
        });
    });

    Route::group(['prefix' => 'report'], function () {

        Route::get('/', [
            'as' => 'control_panel.report',
            'uses' => 'SquidController@viewReport'
        ]);

        Route::post('/', [
            'as' => 'control_panel.report',
            'uses' => 'SquidController@getReport'
        ]);

    });

    Route::group(['prefix' => 'js'], function () {
        Route::post('top/resources', 'SquidController@getTopResources');
    });
});