<?php

namespace App\Http\Controllers;


use App\Permissions;
use App\Profiles;
use App\Roles;
use App\User;
use Auth;
use DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','CheckLoginRepeat']);
    }

    public function index()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'dashboard');
        if(Profiles::find(Auth::user()->id)){
            return view('home');
        }
        $user = User::find(Auth::user()->id);
        $roles = Roles::all();
        $permissions = Permissions::all();
        $provinces = DB::table('provinces')->get()->toArray();
        return view('users.update', compact('user', 'provinces', 'roles', 'permissions'));
    }
}
