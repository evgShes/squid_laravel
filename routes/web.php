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
Route::get('logout',[
    'as'=>'logout',
    'uses'=>'Auth\LoginController@logout'
]);
Route::get('/={name?}', function($name)
{
//    $url = url('report');
    return view($name);
});
Route::get('/home', 'HomeController@index');



Route::group(['middleware'=>'auth'],function (){
    Route::get('view',function (){
        return view('control_panel.settings');
    });
});