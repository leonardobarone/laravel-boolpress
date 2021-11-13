<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

// ROTTE PUBBLICHE
Route::get('/', 'PageController@index');
Route::get('/posts', 'PostController@index');

// ROTTE AUTENTICAZIONE
Auth::routes();

// ROTTE PER ADMIN
// il namespace è la cartella dov'è contenuto il Controller
// name + name = rotta
// prefix -> /admin
Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function(){
    
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('posts', 'PostController');

});