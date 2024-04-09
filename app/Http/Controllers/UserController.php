<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('auth.register'); 
    }
    

    public function check_email(){
        return view('auth.check-email');
    }
    public function reset_password(){
        return view('auth.reset-password');
    }

    public function reset_password_comp(){
        return view('auth.reset-password-complete');
    }

    public function store(StoreUserRequest $request) 
    {
        User::create([
            'employee_id' => $request->employee_id,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'role' => $request->role,
            'branch_office' => $request->branch_office,
        ]);

        return redirect('/')->with('success', 'User registered successfully!'); 
    }
}