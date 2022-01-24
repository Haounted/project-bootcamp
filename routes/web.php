<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('/','Auth\LoginController@login');

// add content
Route::resource('/dashboard','ContentController');
// add photo
Route::group(['prefix' => 'content/{id}', 'as' => 'content.'], function () {
    Route::get('/','PhotoController@index')->name('index');
    Route::get('/addphoto','PhotoController@create')->name('create');
    Route::post('/','PhotoController@store')->name('store');
    Route::get('/{id2}','PhotoController@show')->name('show');
    Route::get('/{id2}/edit','PhotoController@edit')->name('edit');
    Route::put('/{id2}','PhotoController@update')->name('update');
    Route::delete('/{id2}','PhotoController@destroy')->name('destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => 'revalidate'], function (){
//     Route::get('/', 'Auth\LoginController@showLoginForm');
//     Route::post('/','Auth\LoginController@login');
// });