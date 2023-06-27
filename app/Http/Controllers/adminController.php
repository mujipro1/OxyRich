<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function edit($customerId)
    {
        return view('customerEdit', ['customerId']);
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

    public function findOrder($id){

        if($id == 1){
            return view("adminViewOrder");
        }

        if($id == 2){
            return view("adminViewOrder");
        }
      
    }

}
