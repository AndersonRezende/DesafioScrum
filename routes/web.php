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

Auth::routes();

Route::get('/', [App\Http\Controllers\ShopController::class, 'index'])->name('client.shop.index');
Route::get('/home', [App\Http\Controllers\ShopController::class, 'index'])->name('client.shop.index');
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('client.shop.index');

Route::prefix('cliente')->group(function(){
	Route::get('/login', [App\Http\Controllers\Auth\ClientLoginController::class, 'showLoginForm'])->name('client.login');
	Route::post('/login', [App\Http\Controllers\Auth\ClientLoginController::class, 'login'])->name('client.login.submit');
	Route::post('/logout', [App\Http\Controllers\Auth\ClientLoginController::class, 'logout'])->name('client.logout');

	Route::group(['middleware' => ['auth:client']], function(){
		Route::get('/', function () {
			return view('welcome');
		})->name('client.home');
	});
});

Route::prefix('admin')->group(function(){
	Route::group(['middleware' => ['auth']], function(){
		Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
		Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

		Route::group(['middleware' => 'check_access_level:1'], function(){
			Route::resource('usuarios', App\Http\Controllers\UserController::class)->names('users')->parameters(['usuarios' => 'user']);
			Route::resource('clientes', App\Http\Controllers\ClientController::class)->names('clients')->parameters(['clientes' => 'client']);
			Route::resource('produtos', App\Http\Controllers\ProductController::class)->names('products')->parameters(['produtos' => 'product']);
		});
	});
});