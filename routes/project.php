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
// Landing Page Routes
// Route::get('/', function () {
//     return view('welcome');
// })->name('landing');

Route::get('/', 'Admin\AdminController@dashboard')->name('dashboard');



