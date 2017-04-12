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

Route::get('/', "SquidController@mainFunc");

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

    Route::group(['prefix'=>'squid'],function (){

        Route::get('view', [
            'as' => 'squid.view',
            'uses' => 'SquidController@viewSquidLog'
        ]);

        Route::post('restart',"SquidController@squidRestart");
    });


});