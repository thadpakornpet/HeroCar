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
  Route::group(['prefix' => 'mails'], function (){
      Route::get('/', 'MailsController@index');
      Route::post('/', 'MailsController@send');
      Route::get('/getDownload/{id}', 'MailsController@getDownload');
      Route::get('/inbox/{id}', 'MailsController@inbox');
  });
  Route::post('/tasks/updated', 'TasksController@updated');
  Route::post('/tasks/delete', 'TasksController@delete');
  Route::post('/invite', 'UserController@invite');
  Route::group(['prefix' => 'tables'], function (){
      Route::get('/country', 'TablesController@country');
      Route::get('/body', 'TablesController@body');
      Route::post('/country/delete', 'TablesController@countrydelete');
      Route::get('/country/{id}/edit', 'TablesController@countryedit');
      Route::get('/body', 'TablesController@body');
      Route::post('/body/delete', 'TablesController@bodydelete');
      Route::get('/body/{id}/edit', 'TablesController@bodyedit');
      Route::get('/color', 'TablesController@color');
      Route::post('/color/delete', 'TablesController@colordelete');
      Route::get('/color/{id}/edit', 'TablesController@coloredit');
      Route::get('/drive', 'TablesController@drive');
      Route::get('/engine', 'TablesController@engine');
      Route::get('/fuel', 'TablesController@fuel');
      Route::get('/make', 'TablesController@make');
      Route::get('/make/{id}/edit', 'TablesController@makeedit');
      Route::post('/make/delete', 'TablesController@makedelete');
      Route::get('/model', 'TablesController@model');
      Route::post('/model/delete', 'TablesController@modeldelete');
      Route::get('/model/{id}/edit', 'TablesController@modeledit');
      Route::get('/trans', 'TablesController@trans');
  });
  Route::post('/country/create', 'TablesController@countrycreate');
  Route::post('/country/edit', 'TablesController@countrysave');
  Route::post('/body/create', 'TablesController@bodycreate');
  Route::post('/body/edit', 'TablesController@bodysave');
  Route::post('/color/create', 'TablesController@colorcreate');
  Route::post('/color/edit', 'TablesController@colorsave');
  Route::post('/make/create', 'TablesController@makecreate');
  Route::post('/make/edit', 'TablesController@makesave');
  Route::post('/model/create', 'TablesController@modelcreate');
  Route::post('/model/edit', 'TablesController@modelsave');
  Route::group(['prefix' => 'sold'],function (){
      Route::get('/', 'SoldController@index');
      Route::get('/manage', 'SoldController@list');
      Route::post('/approve', 'SoldController@manage');
      Route::post('/', 'SoldController@sold');
      Route::get('/list', 'SoldController@list');
      Route::post('/delete', 'SoldController@delete');
      Route::get('/detail/{id}', 'SoldController@detail');
      Route::get('/edit/{id}', 'SoldController@edit');
      Route::post('/deleteimg', 'SoldController@deleteimg');
      Route::post('/soldedit', 'SoldController@soldedit');
  });
});
