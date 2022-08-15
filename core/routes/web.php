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

// User Routes
Route::get('/', 'UserController@index')->name('front.index');

Route::get('/user/register/add', 'UserController@add')->name('user.add');
Route::post('/user/register/store', 'UserController@store')->name('user.store');
Route::get('/user/register/edit/{id}', 'UserController@edit')->name('user.edit');
Route::post('/user/register/update', 'UserController@update')->name('user.update');
Route::post('/user/register/changepass', 'UserController@changepass')->name('user.changepass');
Route::post('/user/register/delete', 'UserController@delete')->name('user.delete');

// Product variants Routes
Route::get('/product/variant', 'VariantController@index')->name('variant.index');
Route::post('/product/variant/store', 'VariantController@store')->name('variant.store');
Route::get('/product/variant/edit/{id}', 'VariantController@edit')->name('variant.edit');
Route::post('/product/variant/update', 'VariantController@update')->name('variant.update');
Route::post('/product/variant/delete', 'VariantController@delete')->name('variant.delete');

// Product variants value Routes
Route::get('/product/variant/value/{id}', 'VariantValueController@index')->name('variant.value.index');
Route::post('/product/variant/value/store', 'VariantValueController@store')->name('variant.value.store');
Route::get('/product/variant/value/edit/{id}', 'VariantValueController@edit')->name('variant.value.edit');
Route::post('/product/variant/value/update', 'VariantValueController@update')->name('variant.value.update');
Route::post('/product/variant/value/delete', 'VariantValueController@delete')->name('variant.value.delete');

// Products Routes
Route::get('/product/add', 'ProductController@add')->name('product.add');
Route::post('/product/store', 'ProductController@store')->name('product.store');
Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
Route::post('/product/update', 'ProductController@update')->name('product.update');
Route::post('/product/delete', 'ProductController@delete')->name('product.delete');

// Products manage variants Routes
Route::get('/product/variant/manage/{id}', 'ProductVariantController@index')->name('product.variant.manage');
Route::get('/product/variant/manage/edit/{id}', 'ProductVariantController@edit')->name('product.variant.manage.edit');
Route::post('/product/variant/manage/store', 'ProductVariantController@store')->name('product.variant.manage.store');
Route::post('/product/variant/manage/update', 'ProductVariantController@update')->name('product.variant.manage.update');
Route::post('/product/variant/manage/delete', 'ProductVariantController@delete')->name('product.variant.manage.delete');

