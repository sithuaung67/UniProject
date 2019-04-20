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
Route::get('/',[
    'uses'=>'WelcomeController@getWelcome',
    'as'=>'/'
]);
Route::get('/category/{id}',[
    'uses'=>'WelcomeController@getPosts',
    'as'=>'post'
]);

Route::get('/file-public/{file_name}',[
    'uses'=>'WelcomeController@getFile',
    'as'=>'file-public.get'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/file/upload',[
    'uses'=>'HomeController@postUploadFile',
    'as'=>'file.upload'
]);
Route::get('/file/{file_name}',[
    'uses'=>'HomeController@getFile',
    'as'=>'file.get'
]);
