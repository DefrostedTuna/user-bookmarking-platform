<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/bookmarks', 'BookmarkController')->except([
        'show',
    ]);
    Route::get('/bookmarks/{bookmark}/delete')->name('bookmarks.delete')->uses('BookmarkController@delete')->middleware('can:delete,bookmark');
});

