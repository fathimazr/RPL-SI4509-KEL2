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
        return view('register-new-user.register-new-user'); 
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

        $user = new User([
            'employee_id' => $request->employee_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'branch_office' => $request->branch_office,
        ]);
        // dd($request->all());
        $user->save();
        return redirect('dashboard');
    }
}