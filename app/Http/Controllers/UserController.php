<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function submit(Request $req)
    {
        $validatedData = $req->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'password' => 'required|min:5',
            'rpassword' => 'required|min:5',
            'address' => 'required'
        ]);
        
        $firstname = $validatedData['fname'];
        $lastname = $validatedData['lname'];
        $email = $validatedData['email'];
        $phone = $validatedData['phone'];
        $password = $validatedData['password'];
        $rpassword = $validatedData['rpassword'];
        $address = $validatedData['address'];

        if($password != $rpassword)
        {
            return redirect()->back()->with('fail', 'Passwords do not match');
        }
        else
        {
            return view('login')->with('success', 'Sign up successful, Login to continue');
        }
    }

}
