<?php

namespace App\Http\Controllers;

use App\Bodytype;
use App\Color;
use App\Country;
use App\Drive;
use App\Engine;
use App\Fuel;
use App\Make;
use App\Models;
use App\Sold;
use App\SoldFeater;
use App\SoldImage;
use App\Transmission;
use Illuminate\Http\Request;
use Auth;
use File;

class SoldController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:owner', 'permission:ALL-Plivilege'])->except(['infomodel', 'infobodytype']);
    }

    public function index()
    {
        return view('sold.index', [
            'makes' => Make::all(),
            'trans' => Transmission::all(),
            'drives' => Drive::all(),
            'engines' => Engine::all(),
            'fuels' => Fuel::all(),
            'colors' => Color::all()
        ]);
    }

    public function edit($id)
    {
        $sold = Sold::where('id', $id)->first();
        if ($sold->status == 2 || $sold->status == 3) {
            return back()->with('error', 'error');
        } else {
            return view('sold.edit', [
                'sold' => $sold,
                'makes' => Make::all(),
                'trans' => Transmission::all(),
                'drives' => Drive::all(),
                'engines' => Engine::all(),
                'fuels' => Fuel::all(),
                'colors' => Color::all(),
                'imgs' => SoldImage::where('soldid', $id)->get(),
                'fea' => SoldFeater::where('soldid', $id)->first(),
                'models' => Models::all(),
                'countrys' => Country::all(),
                'bodys' => Bodytype::all(),
            ]);
        }
    }

    public function infomodel(Request $request)
    {
        return response([
            'models' => Models::where('makeid', $request->input('id'))->get(),
            'countrys' => Country::where('id', $request->input('country'))->get(),
        ]);
    }

    public function infobodytype(Request $request)
    {
        return response([
            'bodytypes' => Bodytype::where('id', $request->input('id'))->get(),
        ]);
    }

    public function sold(Request $request)
    {
        $makeid = explode(',', $request->input('makeid'));
        $modelid = explode(',', $request->input('modelid'));
        $id = date('YmdHis');
        Sold::create([
            'id' => $id,
            'makeid' => $makeid[0],
            'modelid' => $modelid[0],
            'licenseno' => $request->input('licenseno'),
            'countryid' => $request->input('countryid'),
            'bodyid' => $request->input('bodyid'),
            'tranmisstionid' => $request->input('tranid'),
            'drivetypeid' => $request->input('driveid'),
            'enginetypeid' => $request->input('engineid'),
            'fueltype' => $request->input('fuelid'),
            'colorid' => $request->input('colorid'),
            'year' => $request->input('year'),
            'miles' => $request->input('mile'),
            'price' => $request->input('price'),
            'soldnote' => $request->input('note'),
            'userid' => Auth::user()->id,
            'status' => 0
        ]);

        if ($request->input('feature')) {
            SoldFeater::create([
                'soldid' => $id,
                'name' => $request->input('feature'),
            ]);
        }

        if ($request->file('upload_file')) {
            for ($i = 0; $i < count($request->file('upload_file')); $i++) {
                $filename = time() . str_random(10) . '.' . $request->file('upload_file')[$i]->getClientOriginalExtension();
                $request->file('upload_file')[$i]->move(public_path() . '/imgcar/', $filename);
                chmod(public_path() . '/imgcar/' . $filename, 0777);
                SoldImage::create([
                    'soldid' => $id,
                    'image' => $filename
                ]);
            }
        }

        return redirect()->to('sold/list')->with('success', 'success');
    }

    public function list()
    {
        return view('sold.list', [
            'solds' => Sold::orderBy('id', 'DESC')->where('userid', Auth::user()->id)->get()
        ]);
    }

    public function delete(Request $request)
    {
        $sold = Sold::where('id', $request->input('id'))->orWhere('status', [0, 1])->first();
        $sold->status = 3;
        $sold->save();
    }

    public function deleteimg(Request $request)
    {
        $img = SoldImage::find($request->input('id'));
        File::delete(public_path() . 'imgcar/' . $img->image);
        $img->delete();
    }

    public function detail($id)
    {
        return view('sold.details', [
            'sold' => Sold::where('id', $id)->first(),
            'imgf' => SoldImage::where('soldid', $id)->first(),
            'imgs' => SoldImage::where('soldid', $id)->get(),
            'fea' => SoldFeater::where('soldid', $id)->first(),
        ]);
    }

    public function soldedit(Request $request)
    {
        $sold = Sold::where('id', $request->input('id'))->first();
        $sold->makeid = $request->input('makeid');
        $sold->modelid = $request->input('modelid');
        $sold->licenseno = $request->input('licenseno');
        $sold->countryid = $request->input('countryid');
        $sold->bodyid = $request->input('bodyid');
        $sold->tranmisstionid = $request->input('tranid');
        $sold->drivetypeid = $request->input('driveid');
        $sold->enginetypeid = $request->input('engineid');
        $sold->fueltype = $request->input('fuelid');
        $sold->colorid = $request->input('colorid');
        $sold->year = $request->input('year');
        $sold->miles = $request->input('mile');
        $sold->price = $request->input('price');
        $sold->soldnote = $request->input('note');
        $sold->status = 0;
        $sold->save();

        if ($request->input('feature')) {
            $fea = SoldFeater::where('soldid', $request->input('id'))->first();
            if ($fea->name != $request->input('feature')) {
                $fea->name = $request->input('feature');
                $fea->save();
            }
        }

        if ($request->file('upload_file')) {
            for ($i = 0; $i < count($request->file('upload_file')); $i++) {
                $filename = time() . str_random(10) . '.' . $request->file('upload_file')[$i]->getClientOriginalExtension();
                $request->file('upload_file')[$i]->move(public_path() . '/imgcar/', $filename);
                chmod(public_path() . '/imgcar/' . $filename, 0777);
                SoldImage::create([
                    'soldid' => $request->input('id'),
                    'image' => $filename
                ]);
            }
        }

        return redirect()->to('sold/list')->with('success', 'success');
    }
}
