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

Route::get('/', 'PagesController@home');
Route::post('/', 'PagesController@store')->name('contact.home');
Route::get('/category/{id}', 'PagesController@category');

Route::group(['prefix'=>'admin', 'middleware'=>'admin', 'namespace'=>'Admin'], function(){
    Route::get('/dashboard', 'ProdukController@dashboard');
    Route::resource('/about', 'AboutController');
    Route::resource('/view-home', 'HomeController');
        Route::resource('/produk', 'ProdukController');
        Route::resource('/category', 'CategoryController');
        Route::resource('/contact', 'ContactController');
        Route::resource('/testimoni', 'TestimoniController');
});

Auth::routes();

// Route::get('/create', 'ContactController@create');
// Route::post('/contact', 'ContactController@store');

// Route::get('/', 'PagesController@home')->name('home-user');

