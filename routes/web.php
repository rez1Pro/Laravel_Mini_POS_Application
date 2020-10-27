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

Route::get('users', function () {
    return view('users.users');
});

Route::get('group', 'App\Http\Controllers\UserGroupController@index');
Route::post('group', 'App\Http\Controllers\UserGroupController@create');
Route::delete('group/{id}', 'App\Http\Controllers\UserGroupController@delete');


Route::get('categories', function () {
    return view('categories.categories');
});

Route::get('products', function () {
    return view('products.products');
});