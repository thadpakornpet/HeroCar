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

Auth::routes();
Route::group(['middleware' => 'CheckLoginRepeat'], function (){
  Route::resource('/company', 'companycontroller')->middleware('auth');
  Route::resource('tasks', 'TasksController')->middleware('auth');
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/getamphures', 'UserController@get_amphures')->name('get_amphures');
  Route::get('/get_dis', 'UserController@get_dis')->name('get_dis');
  Route::resource('/users', 'UserController')->middleware('auth');
  Route::post('/users/roles', 'UserController@roles')->middleware('auth');
  Route::resource('/logs', 'Logscontroller')->middleware('auth');
  Route::get('/mails', 'MailsController@index')->middleware('auth');
  Route::post('/mails', 'MailsController@send')->middleware('auth');
  Route::get('/mails/getDownload/{id}', 'MailsController@getDownload')->middleware('auth');
  Route::get('/mails/inbox/{id}', 'MailsController@inbox')->middleware('auth');
  Route::post('/tasks/updated', 'TasksController@updated')->middleware('auth');
  Route::post('/tasks/delete', 'TasksController@delete')->middleware('auth');
  Route::post('/invite', 'UserController@invite')->middleware('auth');

  Route::get('/tables/country', 'TablesController@country')->middleware('auth');
  Route::get('/tables/body', 'TablesController@body')->middleware('auth');
  Route::post('/tables/country/delete', 'TablesController@countrydelete')->middleware('auth');
  Route::post('/country/create', 'TablesController@countrycreate')->middleware('auth');
  Route::get('/tables/country/{id}/edit', 'TablesController@countryedit')->middleware('auth');
  Route::post('/country/edit', 'TablesController@countrysave')->middleware('auth');

  Route::get('/tables/body', 'TablesController@body')->middleware('auth');
  Route::post('/tables/body/delete', 'TablesController@bodydelete')->middleware('auth');
  Route::post('/body/create', 'TablesController@bodycreate')->middleware('auth');
  Route::get('/tables/body/{id}/edit', 'TablesController@bodyedit')->middleware('auth');
  Route::post('/body/edit', 'TablesController@bodysave')->middleware('auth');

  Route::get('/tables/color', 'TablesController@color')->middleware('auth');
  Route::post('/tables/color/delete', 'TablesController@colordelete')->middleware('auth');
  Route::post('/color/create', 'TablesController@colorcreate')->middleware('auth');
  Route::get('/tables/color/{id}/edit', 'TablesController@coloredit')->middleware('auth');
  Route::post('/color/edit', 'TablesController@colorsave')->middleware('auth');

  Route::get('/tables/drive', 'TablesController@drive')->middleware('auth');
  Route::get('/tables/engine', 'TablesController@engine')->middleware('auth');
  Route::get('/tables/fuel', 'TablesController@fuel')->middleware('auth');

  Route::get('/tables/make', 'TablesController@make')->middleware('auth');
  Route::post('/make/create', 'TablesController@makecreate')->middleware('auth');
  Route::get('/tables/make/{id}/edit', 'TablesController@makeedit')->middleware('auth');
  Route::post('/make/edit', 'TablesController@makesave')->middleware('auth');
  Route::post('/tables/make/delete', 'TablesController@makedelete')->middleware('auth');

  Route::get('/tables/model', 'TablesController@model')->middleware('auth');
  Route::post('/model/create', 'TablesController@modelcreate')->middleware('auth');
  Route::post('/tables/model/delete', 'TablesController@modeldelete')->middleware('auth');
  Route::get('/tables/model/{id}/edit', 'TablesController@modeledit')->middleware('auth');
  Route::post('/model/edit', 'TablesController@modelsave')->middleware('auth');

  Route::get('/tables/trans', 'TablesController@trans')->middleware('auth');

  Route::post('/sold', function(){
    return back()->with('error','ระบบยังไม่พร้อมให้บริการ');
  });
});
