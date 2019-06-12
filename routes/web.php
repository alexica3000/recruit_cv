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
    return view('layouts.app');
});


Route::resource('recruits', 'RecruitsController');
Route::delete('recruits/{recruit}/s/{skill}', 'RecruitsController@destroySkill');
Route::delete('recruits/{recruit}/w/{work}', 'RecruitsController@destroyWork');

Route::resource('accounts', 'AccountsController');

Route::resource('departments', 'DepartmentsController');

Route::resource('clients', 'ClientsController');

Route::get('/myaccount', 'MyAccountController@index')->name('myaccount');
