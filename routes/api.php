<?php

use Illuminate\Http\Request;

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



Route::Post('building/addbuilding','BuildingController@AddBuilding');

Route::Get('building/showall', 'BuildingController@ShowAll');

Route::Get('test', 'RoomController@View2');