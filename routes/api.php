<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::get('/zip-codes/{param}','App\Http\Controllers\ZipCodesController@get');

Route::get('zip-codes/{cp}', 'App\Http\Controllers\ZipCodesController@get')
    ->where('cp', '(.*)');