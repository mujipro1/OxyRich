<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Locations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function viewCustomer($customer){
        $customer = Customer::with('location')->where('username', $customer)->first();
        return view('customerView', ['customer' => $customer]);
    }
    
    public function CustomerHome(){
        $customer = Session::get(config('session.session_customer'));
        return redirect()->route('customer', ['customer'=> $customer]);
    }

    public function DetailsCustomer(Request $request){
        $customer = Session::get(config('session.session_customer'));
        return view('customerPersonalDetails', ['customer' => $customer]);
    }

    public function DetailsOrderCustomer($customerId){
        $customer = Customer::where('username', $customerId)->first();
        // get orders of this month of the customer
        $orders = $customer->orders()->whereMonth('created_at', date('m'))->get();
        $monthly_bill = $customer->orders()->whereMonth('created_at', date('m'))->sum('bill');
        $monthly_balance = $customer->orders()->whereMonth('created_at', date('m'))->sum('balance');
        return view('DetailsOrderCustomer', ['customer' => $customer, 'orders' => $orders, 
        'monthly_bill' => $monthly_bill, 'monthly_balance' => $monthly_balance, 'id'=>1, 'month'=>date('M Y')]);
    }

    public function Details2OrderCustomer($customerId, Request $req){
        
        $date = $req->input('date');
        if ($date == date('Y-m')){
            return redirect()->route('DetailsOrderCustomer', ['customerId' => $customerId]);
        }
        
        $customer = Customer::where('username', $customerId)->first();
        // get orders of this month of the customer
        $orders = $customer->orders()->whereMonth('created_at', date('m', strtotime($date)))->get();
        return view('DetailsOrderCustomer', ['customer' => $customer, 'orders' => $orders, 'id'=>2, 'month'=>date('M Y', strtotime($date))]);
    }
}
