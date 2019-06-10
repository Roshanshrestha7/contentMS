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



Auth::routes();
Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/page','PagesController');
    Route::resource('/gallery','GalleriesController');
    Route::resource('/image','ImagesController');
    Route::resource('/contact','ContactController');
    Route::resource('/user','UsersController');
    Route::resource('/notice','NoticesController');
    Route::resource('/event','EventsController');
    //Route::get('/getImage','ImagesController@getImages');
    Route::get('/getImage/{id}','ImagesController@getImages');
    Route::get('/addImage/{id}','ImagesController@getImages');

    Route::get('/createImages/{id}','ImagesController@createImages');


    Route::get('/page/status/{id}','PagesController@status')->name('page.status');
    Route::get('/gallery/status/{id}','GalleriesController@status')->name('gallery.status');
    Route::get('/gallery/banner/{id}','GalleriesController@banner')->name('gallery.banner');
    Route::get('/user/admin/{id}','UsersController@admin')->name('user.admin');
    Route::get('/notice/status/{id}','NoticesController@status')->name('notice.status');


    Route::post('/changePassword','UsersController@changePassword')->name('changePassword');

    //Route::resource('/page','PagesCochangePasswordntroller');

});
Route::get('/','FrontEndsController@index')->name('frontend');
Route::get('/single/{id}','FrontEndsController@show')->name('single.show');
Route::get('/gallery/{id}','FrontEndsController@getImages')->name('gallery.coll');
Route::get('/contact','FrontEndsController@form')->name('contact');
Route::get('/notice','FrontEndsController@notice')->name('notice');
Route::get('/notice/single/{id}','FrontEndsController@singlenot')->name('singlenotice');

Route::get('/test','FrontEndsController@index');





