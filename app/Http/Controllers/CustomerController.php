<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function edit($customerId)
    {
        return view('customerEdit', ['customerId' => $customerId]);
    }
}
