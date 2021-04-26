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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});

Route::get('products', 'App\Http\Controllers\ProductsController@index');
Route::get('list-products', 'App\Http\Controllers\ProductsController@list');
Route::post('add-products', 'App\Http\Controllers\ProductsController@addOrEdit');
Route::get('edit-products/{id}', 'App\Http\Controllers\ProductsController@edit');
Route::post('delete-products', 'App\Http\Controllers\ProductsController@delete');


Route::get('brands', 'App\Http\Controllers\BrandsController@index');
Route::get('list-brands', 'App\Http\Controllers\BrandsController@list');
Route::post('add-brands', 'App\Http\Controllers\BrandsController@addOrEdit');
Route::get('edit-brands/{id}', 'App\Http\Controllers\BrandsController@edit');
Route::post('delete-brands', 'App\Http\Controllers\BrandsController@delete');
