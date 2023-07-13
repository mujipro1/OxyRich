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

Route::get('/access-denied', function () {
    return view('access-denied');
}) -> name('access-denied');

Route::get('/sign-up', function () {
    return view('signup');
}) -> name('sign-up');

// ----------------------------


Route::middleware('checksessioncustomer')->group(function () {

// customer view routes

Route::get('/customer{customer}', 'App\Http\Controllers\CustomerController@viewCustomer')->name('customer');

Route::get("dashboardC", "App\Http\Controllers\CustomerController@CustomerHome")->name('DashboardC');

Route::get('/logoutCustomer', 'App\Http\Controllers\UserController@logoutCustomer')->name('logoutCustomer');

Route::post("DetailsCustomer", "App\Http\Controllers\CustomerController@DetailsCustomer")->name('DetailsCustomer');
Route::get("DetailsOrderCustomer{customerId}", "App\Http\Controllers\CustomerController@DetailsOrderCustomer")->name('DetailsOrderCustomer');
Route::post("DetailsOrderCustomer{customerId}", "App\Http\Controllers\CustomerController@Details2OrderCustomer")->name('DetailsOrderCustomer');
// --------------------------------------
});


// employee view routes 

Route::middleware('checksessionemp')->group(function(){

Route::get("dashboardE", 'App\Http\Controllers\employeeController@EmpHome')->name('DashboardA');
Route::get('/employee{employee}', 'App\Http\Controllers\employeeController@viewEmployee')->name('employee');
Route::get('/logoutEmployee', 'App\Http\Controllers\UserController@logoutEmployee')->name('logoutEmployee');
Route::get('/bottleDetails{employee}', 'App\Http\Controllers\employeeController@bottleDetails')->name('bottleDetails');
Route::post('submitBottles', 'App\Http\Controllers\employeeController@submitBottles')->name('submitBottles');

});
// ----------------------------------------



// admin view routes
Route::middleware('ordercheck')->group(function(){
    
    Route::get('/order', function () {
        return view('placeOrderEmp');
    }) -> name('order');
    
    Route::get('/placeOrder{customerId}', 'App\Http\Controllers\employeeController@placeOrder')->name('placeOrder');
    Route::post('/submitSector', 'App\Http\Controllers\employeeController@submitSector')->name('submitSector');
    Route::get('/sectors', 'App\Http\Controllers\employeeController@sectors')->name('sectors');
    Route::get('/sectors1', 'App\Http\Controllers\employeeController@sectors1')->name('sectors1');
    Route::get('/submitSector{sector}_{subsector}', 'App\Http\Controllers\employeeController@returnToSector')->name('returnToSector');
    Route::post('/submitOrder', 'App\Http\Controllers\employeeController@submitOrder')->name('submitOrder');
});


Route::middleware('checksession')->group(function(){

    Route::get("dashboardA", "App\Http\Controllers\adminController@AdminHome")->name('DashboardA');
    Route::get('/logoutAdmin', 'App\Http\Controllers\UserController@logoutAdmin')->name('logoutAdmin');

    Route::get('/admin{admin}', "App\Http\Controllers\adminController@viewAdmin")->name('admin');


    Route::get('/CustomerList', 'App\Http\Controllers\adminController@viewCustomerList')->name('CustomerList');
    Route::get('/EmployeeList', 'App\Http\Controllers\adminController@viewEmployeeList')->name('EmployeeList');

    Route::get('/deactivateCustomer{customerId}', 'App\Http\Controllers\adminController@deactivateCustomer')->name('deactivateCustomer');
    Route::get('/deactivateEmployee{employeeId}', 'App\Http\Controllers\adminController@deactivateEmployee')->name('deactivateEmployee');
    Route::get('/activateCustomer{customerId}', 'App\Http\Controllers\adminController@activateCustomer')->name('activateCustomer');
    Route::get('/activateEmployee{employeeId}', 'App\Http\Controllers\adminController@activateEmployee')->name('activateEmployee');


    Route::post('/adminAuth', 'App\Http\Controllers\UserController@authenticateAdmin')->name('adminAuth');

    Route::get('/editCustomer{customerId}', 'App\Http\Controllers\adminController@edit')->name('editCustomer');

    Route::post('/saveCustomerChanges', 'App\Http\Controllers\adminController@saveChanges')->name('saveCustomerChanges');

    Route::get('/viewOrderDetails{id}' ,'App\Http\Controllers\adminController@findOrder') -> name('viewOrderDetails');
    Route::post('/adminViewOrder{admin}', 'App\Http\Controllers\adminController@viewOrder')->name('adminViewOrder');
    Route::post('/adminView2Order{admin}', 'App\Http\Controllers\adminController@view2Order')->name('adminView2Order');

    Route::get('/orderDetails{orderId}', 'App\Http\Controllers\adminController@viewOrderDetails')->name('orderDetails');

    Route::get('/AddNewCustomer', 'App\Http\Controllers\adminController@addNewCustomer')->name('AddNewCustomer');
    Route::post('/submitNewCustomer', 'App\Http\Controllers\adminController@submitNewCustomer')->name('submitNewCustomer');
    Route::post('/searchCustomer', 'App\Http\Controllers\adminController@searchCustomer')->name('searchCustomer');
    Route::get('/searchCustomer', 'App\Http\Controllers\adminController@viewCustomerList')->name('searchCustomer');

    Route::post("/submit-expenses", "App\Http\Controllers\adminController@submitExpenses")->name("submit-expenses");

    Route::get("viewLocations", 'App\Http\Controllers\adminController@viewLocations')->name('viewLocations');
    Route::get("addLocations", 'App\Http\Controllers\adminController@addLocations')->name('addLocations');
    Route::post("searchSector", 'App\Http\Controllers\adminController@searchSector')->name('searchSector');

    Route::post('addNewLocation', 'App\Http\Controllers\adminController@addNewLocation')->name('addNewLocation');
});

// -------------------------------------------
// logout routes
