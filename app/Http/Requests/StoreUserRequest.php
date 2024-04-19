<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'employee_id' => 'required|unique:users', 
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
            'branch_office' => 'required',
        ];
    }
}
