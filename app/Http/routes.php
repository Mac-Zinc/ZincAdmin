<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'welcome@index');
Route::get('List', 'welcome@showProfile');
Route::get('load2', 'welcome@showProfile2');
Route::get('load3', 'welcome@showProfile3');