<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function submit(Request $req)
    {      
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $username = $req->input('username');
        $password = $req->input('password');

        if($password != "12345678")
        {
            return redirect()->back()->with('fail', 'Invalid Credentials');
        }
        else
        {
            return redirect()->route('home');
        }
    }

}
