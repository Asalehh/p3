<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/




Route::get('/', 'homeController@index');
Route::get('/lorem-ipsum', 'homeController@lorem');
Route::post('/lorem-ipsum', 'homeController@lorem');
Route::get('/user-generator', 'homeController@userGenerator');
Route::post('/user-generator', 'homeController@userGenerator');



Route::get('/download',function(){

	


});