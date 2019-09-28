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
    return redirect()->to('/home');
});

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');
Route::get('/email/invited/{id}', 'UserController@invited');
Route::post('/registerinvate', 'UserController@registerinvate');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getamphures', 'UserController@get_amphures')->name('get_amphures');
Route::get('/get_dis', 'UserController@get_dis')->name('get_dis');
Route::group(['prefix' => 'infosold'], function (){
    Route::post('model', 'SoldController@infomodel');
    Route::post('bodytype', 'SoldController@infobodytype');
});

Auth::routes();
Route::group(['middleware' => ['CheckLoginRepeat', 'auth']], function (){
  Route::resource('/company', 'companycontroller');
  Route::resource('tasks', 'TasksController');
  Route::resource('/users', 'UserController');
  Route::post('/users/roles', 'UserController@roles');
  Route::resource('/logs', 'Logscontroller');
  Route::get('/mails', 'MailsController@index');
  Route::post('/mails', 'MailsController@send');
  Route::get('/mails/getDownload/{id}', 'MailsController@getDownload');
  Route::get('/mails/inbox/{id}', 'MailsController@inbox');
  Route::post('/tasks/updated', 'TasksController@updated');
  Route::post('/tasks/delete', 'TasksController@delete');
  Route::post('/invite', 'UserController@invite');

  Route::get('/tables/country', 'TablesController@country');
  Route::get('/tables/body', 'TablesController@body');
  Route::post('/tables/country/delete', 'TablesController@countrydelete');
  Route::post('/country/create', 'TablesController@countrycreate');
  Route::get('/tables/country/{id}/edit', 'TablesController@countryedit');
  Route::post('/country/edit', 'TablesController@countrysave');

  Route::get('/tables/body', 'TablesController@body');
  Route::post('/tables/body/delete', 'TablesController@bodydelete');
  Route::post('/body/create', 'TablesController@bodycreate');
  Route::get('/tables/body/{id}/edit', 'TablesController@bodyedit');
  Route::post('/body/edit', 'TablesController@bodysave');

  Route::get('/tables/color', 'TablesController@color');
  Route::post('/tables/color/delete', 'TablesController@colordelete');
  Route::post('/color/create', 'TablesController@colorcreate');
  Route::get('/tables/color/{id}/edit', 'TablesController@coloredit');
  Route::post('/color/edit', 'TablesController@colorsave');

  Route::get('/tables/drive', 'TablesController@drive');
  Route::get('/tables/engine', 'TablesController@engine');
  Route::get('/tables/fuel', 'TablesController@fuel');

  Route::get('/tables/make', 'TablesController@make');
  Route::post('/make/create', 'TablesController@makecreate');
  Route::get('/tables/make/{id}/edit', 'TablesController@makeedit');
  Route::post('/make/edit', 'TablesController@makesave');
  Route::post('/tables/make/delete', 'TablesController@makedelete');

  Route::get('/tables/model', 'TablesController@model');
  Route::post('/model/create', 'TablesController@modelcreate');
  Route::post('/tables/model/delete', 'TablesController@modeldelete');
  Route::get('/tables/model/{id}/edit', 'TablesController@modeledit');
  Route::post('/model/edit', 'TablesController@modelsave');

  Route::get('/tables/trans', 'TablesController@trans');

  Route::get('/sold', 'SoldController@index');
  Route::post('/sold', 'SoldController@sold');
  Route::get('/sold/list', 'SoldController@list');
  Route::post('/sold/delete', 'SoldController@delete');
});
