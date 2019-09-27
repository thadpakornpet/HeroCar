<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\subTypeOfUser;
use App\TypeOfUser;
use App\Logs;
use Auth;
use App\User;

class Logscontroller extends Controller
{
    protected $per_page = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'logs');
        $users1 = Logs::orderBy('id', 'DESC')->paginate($this->per_page);
        return view('users.index_logs', compact('users1'));

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($remark)
    {
        // return Logs([
        //    'userid' => Auth::user()->id,
        //    'remark' => $remark,
        //    'ipaddress' => request()->server('REMOTE_ADDR'),
        //    'agent' => request()->server('HTTP_USER_AGENT'),
        //  ])->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
