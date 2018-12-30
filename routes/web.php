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
    return view('welcome');
});

Route::get('/home/index','Home\IndexController@index');
Route::post('/home/index','Home\IndexController@post');
Route::get('/home/response','Home\IndexController@response');
Route::get('/home/response1','Home\IndexController@response1');
//操作数据库
Route::get('/home/insert','Home\UserController@insert');
Route::get('/home/select','Home\UserController@select');
Route::get('/home/update','Home\UserController@update');
Route::get('/home/delete','Home\UserController@delete');
//DB构造器操作数据库
Route::get('/home/dbInsertGetId','Home\UserController@dbInsertGetId');
Route::get('/home/dbInsert','Home\UserController@dbInsert');
Route::get('/home/dbselect','Home\UserController@dbselect');
Route::get('/home/dbSelectOne','Home\UserController@dbSelectOne');
Route::get('/home/dbSelectById','Home\UserController@dbSelectById');
Route::get('/home/dbSelectColumns','Home\UserController@dbSelectColumns');
Route::get('/home/dbUpdate','Home\UserController@dbUpdate');
Route::get('/home/dbDelete','Home\UserController@dbDelete');
Route::get('/home/dbJoin','Home\UserController@dbJoin');