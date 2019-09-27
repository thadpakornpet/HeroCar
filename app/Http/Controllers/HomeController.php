<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        request()->session()->forget('menu');
        request()->session()->put('menu','dashboard');
        
        return view('home');
    }
}
