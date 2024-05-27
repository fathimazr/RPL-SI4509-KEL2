<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function index(){
        return view('statistics.index');
    }

    public function maintenance(){
        return view('statistics.maintenance');
    }

    public function mainp(){
        return view('statistics.mainpunc');
    }
}