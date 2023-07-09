<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Orders;
use App\Models\Employee;
use App\Models\Locations;
use App\Models\Expense;
use Session;
use Illuminate\Http\Request;

class employeeController extends Controller
{

    public function EmpHome(){
        if (Session::has(config('session.session_employee'))) {
            $employee = Session::get(config('session.session_employee'));
            return redirect()->route('employee', ['employee' => $employee]);
        } else {
            return redirect()->route('login');
        }
    }

    public function submitSector(Request $req){

        $sector = $req->input('sector');
        $subsector = $req->input('subsector');
    
        if (!($sector || $subsector)){
            return redirect()->back()->with('fail', 'Please select a sector and subsector');
        }
        else{
            $customers = Customer::whereHas('location', function ($query) use ($sector, $subsector) {
                $query->where('sector', $sector)->where('subsector', $subsector);
            })->get();
            
            return view('EmpCustomerList', ['sector' => $sector, 'subsector' => $subsector, 'customers' => $customers]);
        }
    }

    public function placeOrder($customerId){
        $customer = Customer::where('username', $customerId)->first();
        return view('placeOrderEmp', ['customer' => $customer]);
    }

    public function submitOrder(Request $request){
        // get the form data 
        $lastOrder = Orders::orderBy('order_no', 'desc')->first();
        if($lastOrder){
            $order_no = $lastOrder->order_no + 1;
        }
        else{
            $order_no = 1;
        }
        $customer_id = $request->input('customer_id');
        $bottletype = $request->input('bottletype');
        $empty_bottles = $request->input('empty_bottles');
        $filled_bottles = $request->input('filled_bottles');
        $active_bottles = $request->input('active_bottles');
        $bill_no = $request->input('bill_no');
        
        $bill = $request->input('bill');
        $cash = $request->input('cash');
        $total_balance = $request->input('total_balance');
        
        // update the customer table
        $customer = Customer::where('username', $customer_id)->first();
        $customer->active_bottles = $active_bottles;
        $customer->total_balance = $total_balance;
        $customer->save();

        // insert into orders table
        $order = new Orders;
        $order->order_no = $order_no;
        $order->username = $customer_id;
        $order->type = $bottletype;
        $order->empty_bottles = $empty_bottles;
        $order->filled_bottles = $filled_bottles;
        $order->bill = $bill;
        $order->cash = $cash;

        // update expense tabel
        $expense = Expense::whereDate('created_at', date('Y-m-d'))->first();
        if($expense){
            $expense->sales += $bill;
            $expense->save();
        }
        else{
            $expense = new Expense;
            $expense->sales = $bill;
            $expense->petrol_expense = 0;
            $expense->employee_wage = 0;
            $expense->no_of_daily_bottles = 0;
            $expense->filling_charges = 0;
            $expense->save();
        }

        if($bill_no){
            $order->bill_no = $bill_no;
        }
        else{
            $order->bill_no = 0;
        }
        $order->save();

        $employee = Session::get(config('session.session_employee'));
        $admin = Session::get(config('session.session_admin'));
        if ($admin){
            return redirect()->route('admin', ['admin' => $admin])->with('success', 'Order placed successfully');
        }
        else{
            return redirect()->route('employee', ['employee' => $employee])->with('success', 'Order placed successfully');
        }
    }

    public function returnToSector($sector, $subsector){
        $customers = Customer::whereHas('location', function ($query) use ($sector, $subsector) {
            $query->where('sector', $sector)->where('subsector', $subsector);
        })->get();
        
        return view('EmpCustomerList', ['sector' => $sector, 'subsector' => $subsector, 'customers' => $customers]);
    }

    public function viewEmployee($employee){
        $employee = Employee::where('username', $employee)->first();
        return view('employeeView', ['employee' => $employee]);
    }

    public function sectors(){
        $employee = Session::get(config('session.session_employee'));
        $id = 2;
        $locations = Locations::all();
        $admin = Session::get(config('session.session_admin'));
        if ($admin){
            $id = 1;
            return view('sectorView', ['admin' => $admin, 'id' => $id,'locations'=>$locations]);
        }
        else{
            return view('sectorView', ['employee' => $employee, 'id' => $id,'locations'=>$locations]);
        }
    }
    
    public function bottleDetails($employee){
        $employee = Employee::where('username', $employee)->first();
        $expense = Expense::whereDate('created_at',  date('Y-m-d'))->first();
        $filled_bottles = Orders::whereDate('created_at', date('Y-m-d'))->sum('filled_bottles');
        $empty_bottles = Orders::whereDate('created_at', date('Y-m-d'))->sum('empty_bottles');
        if($expense){
            $bottles = $expense->no_of_daily_bottles;
            return view('bottleDetails', ['employee' => $employee, 'bottles'=>$bottles,
            'filled'=>$filled_bottles, 'empty'=>$empty_bottles]);
        }
        else{
            return view('bottleDetails', ['employee' => $employee, 'bottles'=>null,
            'filled'=>$filled_bottles, 'empty'=>$empty_bottles]);
        }
    }

    public function submitBottles(Request $request){
        $bottles = $request->input('loaded_bottles');
        $expense = Expense::whereDate('created_at', date('Y-m-d'))->first();
        if($expense){
            $expense->no_of_daily_bottles = $bottles;
            $expense->save();
        }

        else{
            $expense = new Expense;
            $expense->petrol_expense = 0;
            $expense->employee_wage = 0;
            $expense->filling_charges = 0;
            $expense->no_of_daily_bottles = $bottles;
            $expense->sales = 0;
            $expense->created_at = $date;
            $expense->save();
        }

        $employee = Session::get(config('session.session_employee'));
        return redirect()->route('employee', ['employee' => $employee])->with('success', "Bottles Added Successfully!");
    }
}
