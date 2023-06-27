<?php

namespace App\Http\Controllers;

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
            return view('EmpCustomerList', ['sector' => $sector, 'subsector' => $subsector]);
        }
    }

    public function placeOrder($customerId){
        return view('placeOrderEmp');
    }
}
