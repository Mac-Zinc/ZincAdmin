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

Route::get('login', 'Login@showLoginPage');
Route::post('login', 'Login@loginValidate');
Route::post('fpassword', 'Login@fpassword');
Route::get('logout', 'Login@logout');

Route::get('AccessLevel', 'AccessLevel@getAccessLevel');
Route::get('AccessLevel/{id}', 'AccessLevel@getAccessLevelAreas');
Route::post('AccessLevelSection', 'AccessLevel@getAccessLevelSection');
Route::post('AccessLevelSectionBlock', 'AccessLevel@getAccessLevelFields');
Route::post('AccessLevelFormSave', 'AccessLevel@getAccessLevelFormSave');

Route::get('ContractForm', 'Contracts@getContractForm');

Route::get('TimeSheet', 'TimeSheet@getTimeSheet');

Route::group(['prefix' => 'List'], function(){
	Route::get('ManningLevels/{weekNo?}', 'ManningLevels@getContractForm');
});

	
