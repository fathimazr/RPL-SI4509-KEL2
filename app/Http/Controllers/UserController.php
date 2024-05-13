<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function create()
    {
        // Fetch the list of used employee IDs from the database
        $usedEmployeeIds = User::pluck('employee_id')->toArray();

        $columnDefinition = DB::selectOne("SHOW COLUMNS FROM users WHERE Field = 'employee_id'")->Type;
        preg_match('/^enum\((.*)\)$/', $columnDefinition, $matches);
        $enumValues = [];
        if(isset($matches[1])){
            $enumValues = array_map(function($value) {
                return trim($value, "'");
            }, explode(',', $matches[1]));
        }        

        // Pass the enum values and used employee IDs to the view
        return view('register-new-user.register-new-user', compact('enumValues', 'usedEmployeeIds'));
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
        return redirect('/admin/new');
    }
}