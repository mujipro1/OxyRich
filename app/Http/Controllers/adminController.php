<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function edit($customerId)
    {
        return view('customerEdit', ['customerId' => $customerId]);
    }

    public function saveChanges(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
            
        ]);
        

        $name = $req->input('name');
        $email = $req->input('email');
        $phone = $req->input('phone');
        $address = $req->input('address');


        return redirect()->route('CustomerList')->with('success',"Changes made successfully!");
    }

    public function findOrder(Request $req){
        $order_id = $req->input('orderID');
        $customer_id = $req->input('customerID');

        if(!($order_id || $customer_id)){
            return redirect()->route("admin")->with('emptyID', "Please Enter Order or Customer ID!");
        }

        if ($order_id){
            if ($order_id == "123"){
                return redirect()->back()->with('emptyID', "Order not found!");
            }
            return view("adminViewOrder");
        }
        
        if ($customer_id){
            return redirect()->route("adminViewOrder");
        }

      
    }

}
