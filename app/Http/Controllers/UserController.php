<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        else {
            $users = User::all();

            foreach ($users as $user) {
                echo $user->username;
                echo $user->password;
                echo $user->roll;
            }

            return redirect()->route('home');
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

}
