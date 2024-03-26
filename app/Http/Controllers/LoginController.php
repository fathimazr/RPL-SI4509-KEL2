<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function home(){
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }
}
