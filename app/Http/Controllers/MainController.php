<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
    
    public function dashboard()
    {
        return view('pages.dashboard');
    }
    
    public function data()
    {
        return view('pages.data');
    }
}
