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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// home routes

Route::get('/home', function () {
    return view('home');
}) -> name('home');

Route::get('/login', function () {
    return view('login');
}) -> name('login');

Route::get('/contact', function () {
    return view('contact');
}) -> name('contact');

Route::post('/submit-form', 'App\Http\Controllers\UserController@login')
->name('submit-form');

Route::get('/aboutUs', function () {
    return view('aboutUs');
}) -> name('aboutUs');


Route::get('/sign-up', function () {
    return view('signup');
}) -> name('sign-up');

// ----------------------------




// customer view routes

Route::get('/customer', function () {
    return view('customerView');
}) -> name('customer');

// --------------------------------------



// employee view routes 

Route::get('/employee', function () {
    return view('employeeView');
}) -> name('employee');

Route::get('/sectors', function () {
    return view('sectorView');
}) -> name('sectors');

Route::post('/submitSector', 'App\Http\Controllers\employeeController@submitSector')->name('submitSector');
Route::get('/placeOrder{customerId}', 'App\Http\Controllers\employeeController@placeOrder')->name('placeOrder');

// Route::get('/subsector/{sector}', function ($sector) {
//     return view('subsector', ['sector' => $sector]);
// })-> name('subsector');


Route::get('/order', function () {
    return view('placeOrderEmp');
}) -> name('order');

// ----------------------------------------



// admin view routes

Route::get('/admin', function () {
    return view('adminView');
}) -> name('admin');


Route::get('/CustomerList', function () {
    return view('adminCustomerList');
}) -> name('CustomerList');

Route::get('/deleteCustomer{customerId}', 'App\Http\Controllers\UserController@deleteCustomer')->name('deleteCustomer');


Route::post('/admin/auth/viewUsers', 'App\Http\Controllers\UserController@authenticateAdmin')->name('viewUsers');

Route::get('/customerEdit{customerId}', 'App\Http\Controllers\adminController@edit')->name('customerEdit');

Route::post('/saveCustomerChanges', 'App\Http\Controllers\adminController@saveChanges')->name('saveCustomerChanges');

Route::get('/viewOrderDetails{id}' ,'App\Http\Controllers\adminController@findOrder') -> name('viewOrderDetails');

// -------------------------------------------