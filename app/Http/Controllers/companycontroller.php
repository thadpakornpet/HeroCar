<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\company;
use App\User;
use DB;

class companycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['role:super', 'permission:ALL-Plivilege']);
    }
    
    public function index()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'company');
        $users = User::all();
        $company = company::all();
        return view('company.index', compact('company', 'users'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = company::all();
        return view('company.index', compact('index', 'company'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        company::create([
            'type_business' => $request['type_business'],
            'name_business_th' => $request['name_business_th'],
            'name_business_eng' => $request['name_business_eng'],
            'address_company' => $request['address_company'],
            'vat' => $request['vat'],
            'size' => $request['size'],
            'phone_office' => $request['phone_office'],
            'phone' => $request['phone'],
            'website' => $request['website'],
        ]);

        return redirect('company')->with('success', 'success');
        //
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
        //
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
        $user = company::find($id);
        $input = $request->all();
        $user->update($input);
        return redirect('company')->with('success', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
