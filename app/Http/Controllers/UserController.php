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

}
