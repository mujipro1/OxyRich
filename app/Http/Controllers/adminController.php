<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{

    public function AdminHome(){
        if (Session::has(config('session.session_admin'))) {
            $admin = Session::get(config('session.session_admin'));
            return redirect()->route('admin', ['admin' => $admin]);
        } else {
            return redirect()->route('login');
        }
    }

    public function viewAdmin($admin){
        return view('adminView', ['admin' => $admin]);
    }

    public function viewCustomerList(){
        if (Session::has(config('session.session_admin'))) {
            $admin = Session::get(config('session.session_admin'));
            $customers = Customer::all();
            return view('adminCustomerList', ['admin' => $admin, 'customers' => $customers]);
        } else {
            return redirect()->route('login');
        }
    }

    public function searchCustomer(Request $request){
        $request->validate([
            'search' => 'required'
        ]);

        // check which button was clicked, search or refresh
        if($request->has('searchBtn')){
            // search button was clicked
            $search = $request->input('search');

            if($search){
                $customers = Customer::where('username', 'LIKE', '%'.$search.'%')->orWhere('name', 'LIKE', '%'.$search.'%')
                ->orWhere('phone_no', 'LIKE', '%'.$search.'%')->orWhere('email', 'LIKE', '%'.$search.'%')
                ->orWhere('sector', 'LIKE', '%'.$search.'%')->orWhere('subsector', 'LIKE', '%'.$search.'%')->get();
                return view('adminCustomerList', ['admin' => Session::get(config('session.session_admin')), 'customers' => $customers]);
            }
            else{
                return redirect()->route('CustomerList');
            }
        }

        else if($request->has('refreshBtn')){
            // refresh button was clicked
            return redirect()->route('CustomerList');
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
            $orders = Orders::whereDate('created_at', '=', date('Y-m-d'))->with('customer')->orderBy('created_at', 'desc')->get();
            $total_sale_amount = Orders::whereDate('created_at', '=', date('Y-m-d'))->sum('bill');
            $total_cash_received = Orders::whereDate('created_at', '=', date('Y-m-d'))->sum('cash');
            $total_bottle_sales = Orders::whereDate('created_at', '=', date('Y-m-d'))->sum('filled_bottles');
            return view("adminViewOrder", ['orders' => $orders, 'admin' => Session::get(config('session.session_admin')),
             'id'=>$id, 'total_sale_amount'=>$total_sale_amount, 'total_cash_received'=>$total_cash_received, 'total_bottle_sales'=>$total_bottle_sales]);
        }
        
        if($id == 2){
            $orders = Orders::with('customer')->orderBy('created_at', 'desc')->get();
            $total_sale_amount = Orders::sum('bill');
            $total_cash_received = Orders::sum('cash');
            $total_bottle_sales = Orders::sum('filled_bottles');
            return view("adminViewOrder", ['orders' => $orders, 'admin' => Session::get(config('session.session_admin')),
             'id'=>$id, 'total_sale_amount'=>$total_sale_amount, 'total_cash_received'=>$total_cash_received, 'total_bottle_sales'=>$total_bottle_sales]);
        }
    }

    public function viewOrder($admin, Request $req){

        $date = $req->input('date');
        $search = $req->input('search');
        $asc = $req->input('asc');
        
        $query = Orders::with('customer');
        
        if ($search) {
            $query->whereHas('customer', function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('username', 'LIKE', '%' . $search . '%')
                    ->orWhere('order_no', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('sector', 'LIKE', '%' . $search . '%')
                    ->orWhere('subsector', 'LIKE', '%' . $search . '%');
            });
        }
        
        if ($asc === '1') {
            $query->orderBy('created_at', 'asc');
        } elseif ($asc === '2') {
            $query->orderBy('created_at', 'desc');
        }
        
        if ($date) {
            $query->whereDate('created_at', $date);
            $total_bottle_sales = Orders::whereDate('created_at', $date)->sum('filled_bottles');
            $total_sale_amount = Orders::whereDate('created_at', $date)->sum('bill');
            $total_cash_received = Orders::whereDate('created_at', $date)->sum('cash');
        }
        else{
            $total_bottle_sales = Orders::sum('filled_bottles');
            $total_sale_amount = Orders::sum('bill');
            $total_cash_received = Orders::sum('cash');
        }
        
        $orders = $query->get();

        return view("adminViewOrder", [
            'orders' => $orders,
            'admin' => Session::get(config('session.session_admin')),
            'id' => 2,
            'total_sale_amount' => $total_sale_amount,
            'total_cash_received' => $total_cash_received,
            'total_bottle_sales' => $total_bottle_sales
        ]);
                     
    }

    public function view2Order($admin, Request $req){
        $search = $req->input('search');
        
        $query = Orders::whereDate('created_at', '=', date('Y-m-d'))
                       ->with('customer');
        
        if ($search) {
            $query->whereHas('customer', function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('username', 'LIKE', '%' . $search . '%')
                    ->orWhere('order_no', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('sector', 'LIKE', '%' . $search . '%')
                    ->orWhere('subsector', 'LIKE', '%' . $search . '%');
                });
            }
            
        $orders = $query->orderBy('created_at', 'desc')->get();
        
        $total_bottle_sales = Orders::whereDate('created_at', '=', date('Y-m-d'))->sum('filled_bottles');
        $total_sale_amount = Orders::whereDate('created_at', '=', date('Y-m-d'))->sum('bill');
        $total_cash_received = Orders::whereDate('created_at', '=', date('Y-m-d'))->sum('cash');

        return view("adminViewOrder", [
            'orders' => $orders,
            'admin' => Session::get(config('session.session_admin')),
            'id' => 1,
            'total_sale_amount' => $total_sale_amount,
            'total_cash_received' => $total_cash_received,
            'total_bottle_sales' => $total_bottle_sales
        ]);
        
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
        $description = $request->input('description');
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

        if ($description) {
            $customer->description = $description;
        }

        $customer->is_active = true;
        $customer->save();


        return redirect()->route('CustomerList')->with('success', 'New Customer Added!');
    }

}
