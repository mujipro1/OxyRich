<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Customer;
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
            Session::put('user', $user);
           
            // Add your role-based redirection logic here
            if ($user->roll === 'admin') {
                $admin = Admin::where('username', $credentials['username'])->first();                
                Session::put(config('session.session_admin'), $admin);
                // call a route and pass it the admin object
                return redirect()->route('admin', ['admin' => $admin]);

                
                // return view('adminView', ['admin' => $admin]);
            } elseif ($user->roll === 'employee') {
                $employee = Employee::where('username', $credentials['username'])->first();
                if ($employee->is_active == true){
                    Session::put(config('session.session_employee'), $employee);
                    return view('employeeView', ['employee' => $employee]);
                }
                else{
                    return view('access-denied');
                }
            } elseif ($user->roll === 'customer') {
                $customer = Customer::where('username', $credentials['username'])->first();
                Session::put(config('session.session_customer'), $customer);
                return view('customerView', ['customer' => $customer]);
            }

        } else {
            // Authentication failed
            return redirect()->back()->with('fail', 'Invalid Credentials');
        }
    }
    
    public function logoutAdmin()
    {
        if (Session::has(config('session.session_admin'))) {
            Session::forget(config('session.session_admin'));
        }
        return redirect()->route('login');    
    }

    public function logoutEmployee()
    {
        if (Session::has(config('session.session_employee'))) {
            Session::forget(config('session.session_employee'));
        }
        return redirect()->route('login');    
    }

    public function logoutCustomer()
    {
        if (Session::has(config('session.session_customer'))) {
            Session::forget(config('session.session_customer'));
        }
        return redirect()->route('login');    
    }


    public function authenticateAdmin(Request $req){
        $req->validate([
            'password' => 'required',
            'caller' => 'required'
        ]);

        $password = $req->input('password');
        $caller = $req->input('caller');

        // admin password
        $admin = Session::get(config('session.session_admin'));
        $user = Session::get('user');
        $adminPassword = $user->password;

        if($password != $adminPassword){
            return redirect()->route('admin', ['admin' => $admin])->with('fail', 'Invalid Password!');
        }

        else {
            if ($caller==('C')){
                return redirect()->route('CustomerList');
            }
            if ($caller==('E')){
                return redirect()->route('EmployeeList');
            }
        }
    }
}