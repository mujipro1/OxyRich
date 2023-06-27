<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
        
    public function login(Request $request)
    {      
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = $request->only('username', 'password');
        $remember = $request->has('remember'); // Check if the "Remember Me" checkbox is selected
        
        $user = User::where('username', $credentials['username'])->first();

        // if (Auth::attempt($credentials, $remember)) {
        if ($user && $user->getAuthPassword() == $credentials['password']){
            // $user = Auth::user();
            
            // Add your role-based redirection logic here
            if ($user->roll === 'admin') {
                return redirect()->route('admin');
            } elseif ($user->roll === 'employee') {
                return redirect()->route('employee');
            } else {
                return redirect()->route('customer');
            }
        } else {
            // Authentication failed
            return redirect()->back()->with('fail', 'Invalid Credentials');
        }
    }
    


    public function authenticateAdmin(Request $req){
        $req->validate([
            'password' => 'required',
            'caller' => 'required'
        ]);

        $password = $req->input('password');
        $caller = $req->input('caller');

        
        if($password != "1234")
        {
            return redirect()->back()->with('fail', 'Invalid Password');
        }
        else
        {
            if ($caller==('C')){
                return redirect()->route('CustomerList');
            }
            if ($caller==('E')){
                return redirect()->route('home');
            }
        }

    }

    public function deleteCustomer($customerId){
        return redirect()->back()->with('success', 'Customer Deleted!');
    }

}