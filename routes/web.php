<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function(){
   return redirect()->route('admin.home'); 
});

Route::get('/app', function () {
    return view('layouts.spa');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Auth::routes();
    Route::group(['middleware' => 'can:acces-admin'], function(){
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('banks', 'Admin\BanksController', ['except' => 'show']);
    });
});

