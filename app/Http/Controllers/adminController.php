<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{

    public function viewAdmin($admin){
        return view('adminView', ['admin' => $admin]);
    }

    public function viewCustomerList(){
        if (Session::has('admin')) {
            $admin = Session::get('admin');
            $customers = Customer::all();
            return view('adminCustomerList', ['admin' => $admin, 'customers' => $customers]);
        } else {
            return redirect()->route('login');
        }
    }

    public function edit($customerId)
    {
        $customer = Customer::where('username', $customerId)->first();
        return view('customerEdit', ['customer' => $customer]);
    }

    public function deactivateCustomer($customerId){
        
        $customer = Customer::where('username', $customerId)->first();
        $customer->is_active = false;
        $customer->save();
        
        return redirect()->back()->with('success', 'Customer Deactivated!');
    }

    public function activateCustomer($customerId){
        
        $customer = Customer::where('username', $customerId)->first();
        $customer->is_active = true;
        $customer->save();
        
        return redirect()->back()->with('success', 'Customer Activated!');
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

        // update record
        $customer = Customer::where('username', $req->input('username'))->first();
        $customer->name = $name;
        $customer->email = $email;
        $customer->phone_no = $phone;
        $customer->address = $address;
        $customer->save();

        return redirect()->route('CustomerList')->with('success',"Changes made successfully!");
    }

    public function findOrder($id){

        if($id == 1){
            // all orders
            $orders = Orders::where('created_at', date('Y-m-d'))->with('customer')->get();
            return view("adminViewOrder", ['orders' => $orders, 'admin' => Session::get('admin')]);
        }
        
        if($id == 2){
            // today's orders
            $orders = Orders::with('customer')->get();
            return view("adminViewOrder", ['orders' => $orders, 'admin' => Session::get('admin')]);
        }
      
    }

    public function viewOrderDetails($id){
        $order = Orders::where('order_no', $id)->with('customer')->first();
        return view('adminViewOrderDetails', ['order' => $order]);
    }


}
