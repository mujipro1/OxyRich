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

    public function submitNewCustomer(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:customer',
            'phone' => 'required',
            'sector' => 'required',
            'subsector' => 'required',
            'address' => 'required',
            'password' => 'required',
            'confirmPassword' => 'required',
            'bottletype' => 'required',
            'price' => 'required',
            'security' => 'required',
            'noofbottles' => 'required',
            'dispenser' => 'required'
        ]);

        $name = $request->input('name');
        $username = $request->input('username');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $sector = $request->input('sector');
        $subsector = $request->input('subsector');
        $address = $request->input('address');
        $password = $request->input('password');
        $confirmPassword = $request->input('confirmPassword');
        $bottletype = $request->input('bottletype');
        $bottle_price = $request->input('price');
        $security = $request->input('security');
        $noofbottles = $request->input('noofbottles');
        $dispenser = $request->input('dispenser');
        $dispenserSec = $request->input('securityD');
        $noofDispensers = $request->input('noofDispensers');

        $username = str_replace('-', '', $username);

        if($password != $confirmPassword){
            return redirect()->back()->with('error', 'Passwords do not match!');
        }
        if (strlen($password) < 8) {
            return redirect()->back()->with('error', 'Password must be atleast 8 characters long!');
        }

        $user = new User;
        $user->username = $username;
        $user->password = $password;
        $user->roll = 'customer';
        $user->save();

        $customer = new Customer;
        $customer->name = $name;
        $customer->username = $username;
        $customer->phone_no = $phone;
        $customer->email = $email;
        $customer->sector = $sector;
        $customer->subsector = $subsector;
        $customer->address = $address;
        $customer->bottle_type = $bottletype;
        $customer->bottle_price = $bottle_price;
        $customer->no_of_bottles = $noofbottles;
        $customer->per_bottle_security = $security;
        
        if($dispenser == 'yes'){
            $customer->dispenser = true;
            $customer->per_dispenser_security = $dispenserSec;
            $customer->no_of_dispenser = $noofDispensers;
        } else {
            $customer->dispenser = false;
            $customer->per_dispenser_security = 0;
            $customer->no_of_dispenser = 0;
        }

        $customer->is_active = true;
        $customer->save();


        return redirect()->route('CustomerList')->with('success', 'New Customer Added!');
    }

}
