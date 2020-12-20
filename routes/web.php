<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Products\CategoriesController;
use App\Http\Controllers\Products\ProductsController;

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

//Route::resource('users',UserController::class , ['except' => ['show']]);
Route::resource('users',UserController::class);

Route::get('/group', 'App\Http\Controllers\Users\UserGroupController@index')->name('group');
Route::post('/group', 'App\Http\Controllers\Users\UserGroupController@create')->name('group');
Route::delete('group/{id}', 'App\Http\Controllers\Users\UserGroupController@delete')->name('group/{id}');

Route::resource('categories', CategoriesController::class ,  ['except' => ['show']]);
Route::resource('products', ProductsController::class);