<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Locations;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function viewCustomer($customer){
        $customer = Customer::with('locations')->where('username', $customer)->first();
        return view('customerView', ['customer' => $customer]);
    }
    
    public function CustomerHome(){
        $customer = Session::get(config('session.session_customer'));
        return redirect()->route('customer', ['customer'=> $customer]);
    }
}
