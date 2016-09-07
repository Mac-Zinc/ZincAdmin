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

Route::get('testML/{specificUserId?}/{specificWeekNo?}', 'ManningLevels@createManningLevels');



Route::get('Dashboard', 'CRM@getCRMList');


Route::group(['prefix' => 'List'], function(){
	Route::get('ManningLevels/{weekNo?}', 'ManningLevels@getMLList');
	Route::post('ManningLevels/{weekNo?}', 'ManningLevels@getMLList');
	Route::post('ManningLevels/page/load', 'ManningLevels@getRecords');
	//Route::post('ManningLevels/page/driverLPFilter', 'ManningLevels@getRecordsDriverLPFilter');

	Route::get('Organisation', 'Organisation@getOrganisationList');
	Route::get('Contract', 'Contracts@getContractList');
	Route::get('CRM', 'CRM@getCRMList');
	Route::get('Documents', 'DocumentsHub@getDocumentsHubList');
	Route::get('TimeSheet/{weekNo?}', 'TimeSheet@getTimeSheetList');

});

Route::group(['prefix' => 'Save'], function(){	
	Route::post('ManningLevels/MLQuickView', 'ManningLevels@saveMLQuickView');
	Route::post('ManningLevels/MLMoreData', 'ManningLevels@getMLQuickView');

	Route::post('TimeSheet', 'TimeSheet@saveWeeklyTimeSheet');
	Route::post('AccessLevelFormSave', 'AccessLevel@getAccessLevelFormSave');

	Route::post('Contract', 'Contracts@saveContractsForm');
	Route::post('Organisation', 'Organisation@saveOrganisationForm');
	Route::post('CRM', 'CRM@saveCRMForm');
});

Route::group(['prefix' => 'Form'], function(){	
	Route::get('Organisation/{id?}', 'Organisation@getOrganisationForm');
	Route::get('Contract/{id?}', 'Contracts@getContractForm');
	Route::get('CRM/{id?}', 'CRM@getCRMForm');
	Route::get('TimeSheet/{weekNo?}/{usr_id?}', 'TimeSheet@getTimeSheetForm');
});

Route::get('images/{folder}/{filename}', 'FileRequestHandel@imageFile');

Route::post('Files/', 'FileRequestHandel@sendFiles');
Route::post('GetFiles/', 'FileRequestHandel@getFiles');
Route::get('download/document/{fileId}', 'FileRequestHandel@downloadFile');

//Route::post('demo/table_ajax', 'CRM@table_ajax');


Route::group(['prefix' => 'ListRowsAjax'], function(){	
	Route::post('Organisation', 'Organisation@listRowsAjax');
	Route::post('Contract', 'Contracts@listRowsAjax');
	Route::post('CRM', 'CRM@listRowsAjax');
	Route::post('Documents', 'DocumentsHub@listRowsAjax');
	Route::post('TimeSheet', 'TimeSheet@listRowsAjax');
});
///105/

Route::group(['prefix' => 'Edit'], function(){
	//Route::group(['prefix' => 'CRM'], function(){});
	Route::post('CRM/{fieldID}/{pKey}/{ref_id?}', 'CRM@gridSave');
});
Route::group(['prefix' => 'Ajax'], function(){
	//Route::group(['prefix' => 'CRM'], function(){});
	Route::get('Organisation/{org_lvl}/{id}/{rtn_org_type}', 'Organisation@getRelatedOrgs');
});