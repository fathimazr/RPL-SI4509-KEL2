<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.login');
    }

    public function AdminDashboard(){
        return view('admin.dashboard');
    }

    public function AdminLogin(Request $request){
        // return view('admin.login');
        $check = $request->all();
        dd($request->all());

        if(Auth::guard('admin')->attempt([
            'email' => $check['email'], 
            'employee_id' => $check['employee_id'],
            'password' => $check['password']
        ])){
            return redirect()->route('admin.dashboard')->with('error', 'Admin Lgin Successfully');
        }else{
            return back()->with('error', 'Invalid ID or Password');
        };
    }
}
