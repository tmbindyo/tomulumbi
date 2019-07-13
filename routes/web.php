<?php



// Removed for coming soon
Route::get('/pending', 'LandingController@index')->name('index');
Route::get('/about', 'LandingController@index')->name('about');
Route::get('/contact', 'LandingController@index')->name('contact');

Route::get('/', 'ComingSoon\ComingSoonController@comingSoon')->name('comingSoon');

Auth::routes();



