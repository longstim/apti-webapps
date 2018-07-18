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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/uploadfile','UploadFileController@index');

Route::post('/uploadfile','UploadFileController@postUploadCsv');

Route::get('target','TargetController@tambahtarget');

Route::post('prosestarget','TargetController@prosestarget');

Route::get('readtarget','TargetController@lihattarget');

Route::post('readtarget','TargetController@lihattarget');

Route::get('incentive','IncentiveController@incentivereport');

Route::post('incentive','IncentiveController@incentivereportsearch');

Route::get('updatetarget/{id_sales}/{bulan}/{tahun}','TargetController@updatetarget');

Route::post('prosesupdatetarget','TargetController@prosesupdatetarget');

Route::post('cetaklaporan','IncentiveController@cetaklaporan');


