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
        $filled_bottles = $request->input('filled_bottles');
        $remaining_bottles = $request->input('remaining_bottles');
        $emptied_bottles = $request->input('emptied_bottles');
        $balance = $request->input('balance');
        $cash = $request->input('cash');
        $total = $request->input('total');

        
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
        $employee = Session::get('employee');
        return view('sectorView', ['employee' => $employee]);
    }

    public function bottleDetails($employee){
        $employee = Employee::where('username', $employee)->first();
        return view('bottleDetails', ['employee' => $employee]);
    }
}
