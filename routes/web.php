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

Route::get('/', 'HomeController@index' );
Route::get('/home', 'HomeController@index' );
Route::get('/savings', 'SavingsController@index' );
Route::get('/loan', 'LoanController@index' );


Route::get('/client', 'ClientController@index' ); 


Route::get('/users', 'UsersController@index' );
Route::get('/users', 'UsersController@index' );
