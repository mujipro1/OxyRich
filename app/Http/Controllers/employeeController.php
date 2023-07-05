<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Orders;
use App\Models\Employee;
use Session;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    public function submitSector(Request $req){

        $sector = $req->input('sector');
        $subsector = $req->input('subsector');
    
        if (!($sector || $subsector)){
            return redirect()->back()->with('fail', 'Please select a sector and subsector');
        }
        else{
            $customers = Customer::where('sector', $sector)->where('subsector', $subsector)->get();
            return view('EmpCustomerList', ['sector' => $sector, 'subsector' => $subsector, 'customers' => $customers]);
        }
    }

    public function placeOrder($customerId){
        $customer = Customer::where('username', $customerId)->first();
        $lastOrder = Orders::orderBy('order_no', 'desc')->first();
        $lastOrderId = ($lastOrder->order_no)+1;
        return view('placeOrderEmp', ['customer' => $customer, 'OrderId' => $lastOrderId]);
    }

    public function submitOrder(Request $request){
        // get the form data 
        $order_no = $request->input('order_no');
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
        if($bill_no){
            $order->bill_no = $bill_no;
        }
        else{
            $order->bill_no = 0;
        }
        $order->save();

        return redirect()->route('employee', ['employee' => Session::get(config('session.session_employee'))])->with('success', 'Order placed successfully');  
    }

    public function returnToSector($sector, $subsector){
        $customers = Customer::where('sector', $sector)->where('subsector', $subsector)->get();
        return view('EmpCustomerList', ['sector' => $sector, 'subsector' => $subsector, 'customers' => $customers]);
    }

    public function viewEmployee($employee){
        $employee = Employee::where('username', $employee)->first();
        return view('employeeView', ['employee' => $employee]);
    }

    public function sectors(){
        $employee = Session::get(config('session.session_employee'));
        return view('sectorView', ['employee' => $employee]);
    }

    public function bottleDetails($employee){
        $employee = Employee::where('username', $employee)->first();
        return view('bottleDetails', ['employee' => $employee]);
    }
}
