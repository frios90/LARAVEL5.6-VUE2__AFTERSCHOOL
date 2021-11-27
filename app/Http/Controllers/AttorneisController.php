<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttorneisController extends Controller
{
    public function getDashboard () 
    {
        return view('master');
    }

    public function index () 
    {
        return view('master');
    }
}
