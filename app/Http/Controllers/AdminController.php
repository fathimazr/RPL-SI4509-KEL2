<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.login');
    }

    public function AdminDashboard(){
        return view('admin.adm-dash');
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
            return redirect()->route('admin.dashboard')->with('error', 'Admin Login Successfully');
        }else{
            return back()->with('error', 'Invalid ID or Password');
        };
    }

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
