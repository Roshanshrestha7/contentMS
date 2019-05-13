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
    return view('welcome');
});

Auth::routes();
Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function () {


    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/page/create', 'PagesController@create')->name('page.create');
    Route::get('/page/index', 'PagesController@index')->name('page.index');
    Route::post('/page/store', 'PagesController@store')->name('page.store');
    Route::get('/page/view/{id}','PagesController@show')->name('page.show');
    Route::get('/page/edit/{id}','PagesController@edit')->name('page.edit');
    Route::post('/page/update/{id}','PagesController@update')->name('page.update');
    Route::get('/page/delete/{id}','PagesController@destroy')->name('page.delete');
    Route::get('/page/status/{id}','PagesController@status')->name('page.status');


});