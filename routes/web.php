<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/models', 'IndexController@models')->name('models');
Route::resource('/', 'IndexController');
Route::resource('admin/brand', 'admin\BrandController');
Route::resource('admin/model', 'admin\ModelController');
Route::resource('admin/siteModel', 'admin\SiteModelController');
Route::resource('admin/siteBrand', 'admin\SiteBrandController');
Route::resource('admin/car', 'admin\CarController');
Route::view('rules', 'rules');
Route::view('contacts', 'contacts');

Auth::routes();

Route::get('admin/home', 'admin\HomeController@index')->name('home');
