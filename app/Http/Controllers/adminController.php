<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Locations;
use App\Models\User;
use App\Models\Orders;
use App\Models\Employee;
use App\Models\Expense;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{

    public function AdminHome(){
        if (Session::has(config('session.session_admin'))) {
            $admin = Session::get(config('session.session_admin'));
            $expenses = Expense::whereMonth('created_at', date('m'))->get();
            $bill = Orders::whereMonth('created_at', date('m'))->sum('bill');
            
            $sum_petrol = Expense::whereMonth('created_at', date('m'))->sum('petrol_expense');
            $sum_employee = Expense::whereMonth('created_at', date('m'))->sum('employee_wage');
            $sum_filling = Expense::whereMonth('created_at', date('m'))->sum('filling_charges');
            $others = Expense::whereMonth('created_at', date('m'))->sum('others');
            $sum_sales = Expense::whereMonth('created_at', date('m'))->sum('sales');

            $profit = $sum_sales - ($sum_petrol + $sum_employee + $sum_filling + $others);

            $array = array();
            $array[0] = $sum_petrol;
            $array[1] = $sum_employee;
            $array[2] = $sum_filling;
            $array[3] = $sum_sales;
            $array[4] = $profit;
            $array[5] = $others;
            
            return redirect()->route('admin', ['admin' => $admin, 'expenses' => $expenses, 'bill' => $bill, 'array' => $array]);
        } else {
            return redirect()->route('login');
        }
    }

    public function viewAdmin($admin){
        $expenses = Expense::whereMonth('created_at', date('m'))->get();
        $bill = Orders::whereMonth('created_at', date('m'))->sum('bill');

        $sum_petrol = Expense::whereMonth('created_at', date('m'))->sum('petrol_expense');
            $sum_employee = Expense::whereMonth('created_at', date('m'))->sum('employee_wage');
            $sum_filling = Expense::whereMonth('created_at', date('m'))->sum('filling_charges');
            $sum_sales = Expense::whereMonth('created_at', date('m'))->sum('sales');
            $sum_others = Expense::whereMonth('created_at', date('m'))->sum('others');
            $profit = $sum_sales - ($sum_petrol + $sum_employee + $sum_filling + $sum_others);

            $array = array();
            $array[0] = $sum_petrol;
            $array[1] = $sum_employee;
            $array[2] = $sum_filling;
            $array[3] = $sum_sales;
            $array[4] = $profit;
            $array[5] = $sum_others;
            
        return view('adminView', ['admin' => $admin, 'expenses' => $expenses, 'bill' => $bill, 'array' => $array]);
    }

    public function viewCustomerList(){
        if (Session::has(config('session.session_admin'))) {
            $admin = Session::get(config('session.session_admin'));
            $customers = Customer::with('location')->get();
            return view('adminCustomerList', ['admin' => $admin, 'customers' => $customers, 'id'=>1]);
        } else {
            return redirect()->route('login');
        }
    }

    public function viewEmployeeList(){
        if (Session::has(config('session.session_admin'))) {
            $admin = Session::get(config('session.session_admin'));
            $employees = Employee::all();
            return view('adminCustomerList', ['admin' => $admin, 'employees' => $employees,'id'=>2]);
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
            $customers = Customer::with("location")
                ->join('locations', 'location_id', '=', 'id')
                ->where('username', 'LIKE', '%'.$search.'%')
                ->orWhere('name', 'LIKE', '%'.$search.'%')
                ->orWhere('phone_no', 'LIKE', '%'.$search.'%')
                ->orWhere('email', 'LIKE', '%'.$search.'%')
                ->orWhere('sector', 'LIKE', '%'.$search.'%')
                ->orWhere('subsector', 'LIKE', '%'.$search.'%')
                ->get();

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
        $customer = Customer::with("location")->where('username', $customerId)->first();
        $locations = Locations::all();
        return view('customerEdit', ['customer' => $customer, "locations"=>$locations]);
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

    public function deactivateEmployee($employeeId){
        
        $employee = Employee::where('username', $employeeId)->first();
        $employee->is_active = false;
        $employee->save();
        
        return redirect()->back()->with('success', 'Employee Deactivated!');
    }

    public function activateEmployee($employeeId){
        
        $employee = Employee::where('username', $employeeId)->first();
        $employee->is_active = true;
        $employee->save();
        
        return redirect()->back()->with('success', 'Employee Activated!');
    }

    public function saveChanges(Request $req){
        $req->validate([
            'name' => 'required',
            'username' =>'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            "sector" => 'required',
            "subsector" => 'required',
        ]);
        
        $username = $req->input('username');
        $name = $req->input('name');
        $email = $req->input('email');
        $phone = $req->input('phone');
        $address = $req->input('address');
        $sector = $req->input('sector');
        $subsector = $req->input('subsector');
        $description = $req->input('description');

        $location_id = Locations::where('sector', $sector)->where('subsector', $subsector)->first();
        $location_id = $location_id->id;

        // update record
        $customer = Customer::where('username', $req->input('username'))->first();
        $customer->name = $name;
        $customer->email = $email;
        $customer->phone_no = $phone;
        $customer->address = $address;
        $customer->location_id = $location_id;
        if ($description){
            $customer->description = $description;
        }
        else{
            $customer->description = null;
        }

        $customer->save();

        return redirect()->route('CustomerList')->with('success',"Changes made successfully!");
    }

    public function findOrder($id){

        if($id == 1){
            $orders = Orders::whereDate('created_at', '=', date('Y-m-d'))->with('customer')->orderBy('created_at', 'desc')->get();
            $total_sale_amount = Orders::whereDate('created_at', '=', date('Y-m-d'))->sum('bill');
            $total_cash_received = Orders::whereDate('created_at', '=', date('Y-m-d'))->sum('cash');
            $total_bottle_sales = Orders::whereDate('created_at', '=', date('Y-m-d'))->sum('filled_bottles');
            $total_empty_bottles = Orders::whereDate('created_at', '=', date('Y-m-d'))->sum('empty_bottles');
            $expense = Expense::whereDate('created_at', '=', date('Y-m-d'))->first();
            return view("adminViewOrder", ['orders' => $orders, 'admin' => Session::get(config('session.session_admin')),
             'id'=>$id, 'total_sale_amount'=>$total_sale_amount, 'total_cash_received'=>$total_cash_received,
             'total_bottle_sales'=>$total_bottle_sales, 'total_empty_bottles'=>$total_empty_bottles, 'expense'=>$expense]);
        }
        
        if($id == 2){
            $orders = Orders::with('customer')->orderBy('created_at', 'desc')->get();
            $total_sale_amount = Orders::sum('bill');
            $total_cash_received = Orders::sum('cash');
            $total_bottle_sales = Orders::sum('filled_bottles');
            $total_empty_bottles = Orders::sum('empty_bottles');
            return view("adminViewOrder", ['orders' => $orders, 'admin' => Session::get(config('session.session_admin')),
             'id'=>$id, 'total_sale_amount'=>$total_sale_amount, 'total_cash_received'=>$total_cash_received,
             'total_bottle_sales'=>$total_bottle_sales, 'total_empty_bottles'=>$total_empty_bottles, 'expense'=>null]);
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
            $total_empty_bottles = Orders::whereDate('created_at', $date)->sum('empty_bottles');
        }
        else{
            $total_bottle_sales = Orders::sum('filled_bottles');
            $total_sale_amount = Orders::sum('bill');
            $total_cash_received = Orders::sum('cash');
            $total_empty_bottles = Orders::sum('empty_bottles');
        }

        
        $orders = $query->get();

        return view("adminViewOrder", [
            'orders' => $orders,
            'admin' => Session::get(config('session.session_admin')),
            'id' => 2,
            'total_sale_amount' => $total_sale_amount,
            'total_cash_received' => $total_cash_received,
            'total_bottle_sales' => $total_bottle_sales,
            'total_empty_bottles' => $total_empty_bottles
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
        $total_empty_bottles = Orders::whereDate('created_at', '=', date('Y-m-d'))->sum('empty_bottles');
        $expense = Expense::whereDate('created_at', '=', date('Y-m-d'))->first();

        return view("adminViewOrder", [
            'orders' => $orders,
            'admin' => Session::get(config('session.session_admin')),
            'id' => 1,
            'total_sale_amount' => $total_sale_amount,
            'total_cash_received' => $total_cash_received,
            'total_bottle_sales' => $total_bottle_sales,
            'total_empty_bottles' => $total_empty_bottles,
            'expense' => $expense    
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

        $location = new Locations;
        $location->sector = $sector;
        $location->subsector = $subsector;
        $location->save();
        
        $customer = new Customer;
        $customer->name = $name;
        $customer->username = $username;
        $customer->phone_no = $phone;
        $customer->email = $email;
        $customer->address = $address;
        $customer->bottle_type = $bottletype;
        $customer->bottle_price = $bottle_price;
        $customer->no_of_bottles = $noofbottles;
        $customer->per_bottle_security = $security;
        $customer->location_id = $location->id; 
        
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

    public function submitExpenses(Request $request){

        $petrol_expense = $request->input('petrol_expense');
        $employee_wage = $request->input('employee_wage');
        $bottle_filling_charge = $request->input('bottle_filling_charges');
        $others = $request->input('others');

        $date = date('Y-m-d');

        // check if todays expenses are already added
        $expense = Expense::whereDate('created_at', $date)->first();
        if($expense){
            // update the record
            $expense->petrol_expense = $petrol_expense;
            $expense->employee_wage = $employee_wage;
            $expense->filling_charges = $bottle_filling_charge;
            $expense->others = $others;
            $expense->save();

            return redirect()->back()->with('success', 'Expense Updated!');
        }
        
        else{
            $expense = new Expense;
            $expense->petrol_expense = $petrol_expense;
            $expense->employee_wage = $employee_wage;
            $expense->filling_charges = $bottle_filling_charge;
            $expense->others = $others;
            $expense->no_of_daily_bottles = 0;
            $expense->sales = 0;
            $expense->created_at = $date;
            $expense->save();
        }

        return redirect()->back()->with('success', 'Expense Added!');
    }

    public function viewLocations(){
        $admin = Session::get(config('session.session_admin'));
        $locations = Locations::withCount('customers')->get();
        return view("viewLocations", ['admin'=>$admin,'locations'=>$locations , 'all'=>$locations]);
    }

    public function addLocations(){
        $admin = Session::get(config('session.session_admin'));
        $sectors = Locations::select('sector')->distinct()->get();
        return view("addLocation", ['admin'=>$admin, 'sectors'=>$sectors]);
    }

    public function searchSector(Request $request){
        $sector = $request->input("sector");
        $admin = Session::get(config('session.session_admin'));
        $all = Locations::withCount('customers')->get();

        if($request->has("searchBtn")){
            $locations = Locations::withCount('customers')->where("sector",$sector)->get();
        }
        else{
            $locations = Locations::withCount('customers')->get();
        }
        return view("viewLocations", ['admin'=>$admin,'locations'=>$locations, 'all'=>$all]);
    }

    public function addNewLocation(Request $request){
        $sector = $request->input("sector");
        $subsector = $request->input("subsector");

        $location = new Locations;
        $location->sector = $sector;
        $location->subsector = $subsector;
        $location->save();

        return redirect()->back()->with('success', 'New Location Added!');
    }

    public function addNewCustomer(){
        $sectors = Locations::select('sector')->distinct()->get();
        $locations = Locations::all();
        return view("newCustomer", ['sectors'=>$sectors, 'locations'=>$locations]);
    }
}
