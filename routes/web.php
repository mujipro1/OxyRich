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

Route::get('/home', function () {
    return view('home');
}) -> name('home');

Route::get('/login', function () {
    return view('login');
}) -> name('login');

Route::get('/contact', function () {
    return view('contact');
}) -> name('contact');

Route::post('/submit-form', 'App\Http\Controllers\UserController@submit')->name('submit-form');

Route::get('/aboutUs', function () {
    return view('aboutUs');
}) -> name('aboutUs');

Route::get('/sign-up', function () {
    return view('signup');
}) -> name('sign-up');


Route::get('/customer', function () {
    return view('customerView');
}) -> name('customer');

Route::get('/employee', function () {
    return view('employee');
}) -> name('employee');

Route::get('/sectors', function () {
    return view('sectorView');
}) -> name('sectors');

Route::get('/subsectors', function () {
    return view('subSectors');
}) -> name('sector');

Route::get('/order', function () {
    return view('order');
}) -> name('order');

