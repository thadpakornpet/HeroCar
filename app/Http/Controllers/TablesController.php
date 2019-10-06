<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Bodytype;
use App\Color;
use App\Drive;
use App\Engine;
use App\Fuel;
use App\Make;
use App\Models;
use App\Transmission;

class TablesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:super', 'permission:ALL-Plivilege']);
    }

    protected $per_page = 10;

    public function country()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'country');
        $users = Country::orderBy('id', 'DESC')->paginate($this->per_page);
        return view('tables.country', compact('users'));
    }

    public function countrydelete(Request $request)
    {
        Country::find($request->id)->delete();
        return back()->with('success', 'success');
    }

    public function countrycreate(Request $request)
    {
        Country::create([
            'name' => $request->name,
            'name_short' => $request->name_short
        ]);
        return back()->with('success', 'success');
    }

    public function countryedit($id)
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'country');
        return view('tables.country_edit', ['country' => Country::find($id)]);
    }

    public function countrysave(Request $request)
    {
        $country = Country::find($request->id);
        $country->name = $request->name;
        $country->name_short = $request->name_short;
        $country->save();
        return redirect()->to('/tables/country')->with('success', 'success');
    }

    public function body()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'body');
        $users = Bodytype::orderBy('id', 'DESC')->paginate($this->per_page);
        return view('tables.body', compact('users'));
    }

    public function bodydelete(Request $request)
    {
        Bodytype::find($request->id)->delete();
        return back()->with('success', 'success');
    }

    public function bodycreate(Request $request)
    {
        $filename = time() . str_random(10) . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path() . '/', $filename);
        Bodytype::create([
            'name' => $request->name,
            'image' => $filename,
        ]);
        return back()->with('success', 'success');
    }

    public function bodyedit($id)
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'body');
        return view('tables.body_edit', ['body' => Bodytype::find($id)]);
    }

    public function bodysave(Request $request)
    {
        $country = Bodytype::find($request->id);
        $country->name = $request->name;
        if ($request->file('image')) {
            $filename = time() . str_random(10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path() . '/', $filename);
            $country->image = $filename;
        } else {
            $country->image = $country->image;
        }
        $country->save();
        return redirect()->to('/tables/body')->with('success', 'success');
    }

    public function color()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'color');
        $users = Color::orderBy('id', 'DESC')->paginate($this->per_page);
        return view('tables.color', compact('users'));
    }

    public function colordelete(Request $request)
    {
        Color::find($request->id)->delete();
        return back()->with('success', 'success');
    }

    public function colorcreate(Request $request)
    {
        Color::create([
            'name' => $request->name,
        ]);
        return back()->with('success', 'success');
    }

    public function coloredit($id)
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'color');
        return view('tables.color_edit', ['color' => Color::find($id)]);
    }

    public function colorsave(Request $request)
    {
        $country = Color::find($request->id);
        $country->name = $request->name;
        $country->save();
        return redirect()->to('/tables/color')->with('success', 'success');
    }

    public function drive()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'drive');
        $users = Drive::orderBy('id', 'DESC')->paginate($this->per_page);
        return view('tables.drive', compact('users'));
    }


    public function drivecreate(Request $request)
    {
        Drive::create([
            'name' => $request->name
        ]);
        return back()->with('success', 'success');
    }

    public function driveedit($id)
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'drive');
        return view('tables.drive_edit', ['drive' => Drive::find($id)]);
    }


    public function drivedelete(Request $request)
    {
        Drive::find($request->id)->delete();
        return back()->with('success', 'success');
    }

    public function drivesave(Request $request)
    {
        $country = Drive::find($request->id);
        $country->name = $request->name;
        $country->save();
        return redirect()->to('/tables/drive')->with('success', 'success');
    }






    public function engine()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'engine');
        $users = Engine::orderBy('id', 'DESC')->paginate($this->per_page);
        return view('tables.engine', compact('users'));
    }


    public function enginecreate(Request $request)
    {
        Engine::create([
            'name' => $request->name,
        ]);
        return back()->with('success', 'success');
    }




    public function engineedit($id)
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'engine');
        return view('tables.engine_edit', ['engine' => Engine::find($id)]);
    }

    public function enginedelete(Request $request)
    {
        Engine::find($request->id)->delete();
        return back()->with('success', 'success');
    }


    public function enginesave(Request $request)
    {
        $country = Engine::find($request->id);
        $country->name = $request->name;
        $country->save();
        return redirect()->to('/tables/engine')->with('success', 'success');
    }








    public function fuel()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'fuel');
        $users = Fuel::orderBy('id', 'DESC')->paginate($this->per_page);
        return view('tables.fuel', compact('users'));
    }

    public function fueledit($id)
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'fuel');
        return view('tables.fuel_edit', ['fuel' => Fuel::find($id)]);
    }


    public function fuelcreate(Request $request)
    {
        Fuel::create([
            'name' => $request->name,
        ]);
        return back()->with('success', 'success');
    }



    public function fuelsave(Request $request)
    {
        $country = Fuel::find($request->id);
        $country->name = $request->name;
        $country->save();
        return redirect()->to('/tables/fuel')->with('success', 'success');
    }


    public function fueldelete(Request $request)
    {
        Fuel::find($request->id)->delete();
        return back()->with('success', 'success');
    }



    public function trans()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'tran');
        $users = Transmission::orderBy('id', 'DESC')->paginate($this->per_page);
        return view('tables.trans', compact('users'));
    }



    public function transedit($id)
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'tran');
        return view('tables.trans_edit', ['trans' => Transmission::find($id)]);
    }


    public function transcreate(Request $request)
    {
        Transmission::create([
            'name' => $request->name,
        ]);
        return back()->with('success', 'success');
    }


    public function transdelete(Request $request)
    {
        Transmission::find($request->id)->delete();
        return back()->with('success', 'success');
    }

    public function transsave(Request $request)
    {
        $country = Transmission::find($request->id);
        $country->name = $request->name;
        $country->save();
        return redirect()->to('/tables/trans')->with('success', 'success');
    }

    public function make()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'make');
        $users = Make::orderBy('id', 'DESC')->paginate($this->per_page);
        $country = Country::all();
        return view('tables.make', compact('users', 'country'));
    }
    public function makecreate(Request $request)
    {
        $filename = time() . str_random(10) . '.' . $request->file('logo')->getClientOriginalExtension();
        $request->file('logo')->move(public_path() . '/', $filename);
        Make::create([
            'name' => $request->name,
            'country_id' => $request->country_id,
            'logo' => $filename
        ]);
        return back()->with('success', 'success');
    }
    public function makeedit($id)
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'make');
        return view('tables.make_edit', ['make' => Make::find($id), 'country' => Country::all()]);
    }
    public function makesave(Request $request)
    {
        $country = Make::find($request->id);
        $country->name = $request->name;
        $country->country_id = $request->country_id;
        if ($request->file('logo')) {
            $filename = time() . str_random(10) . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path() . '/', $filename);
            $country->logo = $filename;
        } else {
            $country->logo = $country->logo;
        }

        $country->save();
        return redirect()->to('/tables/make')->with('success', 'success');
    }
    public function makedelete(Request $request)
    {
        Make::find($request->id)->delete();
        return back()->with('success', 'success');
    }

    public function model()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'model');
        $users = Models::orderBy('id', 'DESC')->paginate($this->per_page);
        $body = Bodytype::all();
        $make = Make::all();
        return view('tables.model', compact('users', 'body', 'make'));
    }
    public function modelcreate(Request $request)
    {
        Models::create([
            'name' => $request->name,
            'bodytype' => $request->bodytype,
            'makeid' => $request->makeid
        ]);
        return redirect()->to('/tables/model')->with('success', 'success');
    }
    public function modeldelete(Request $request)
    {
        Models::find($request->id)->delete();
        return back()->with('success', 'success');
    }
    public function modeledit($id)
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'model');
        return view('tables.model_edit', ['model' => Models::find($id), 'body' => Bodytype::all(), 'make' => Make::all()]);
    }

    public function modelsave(Request $request)
    {
        $country = Models::find($request->id);
        $country->name = $request->name;
        $country->bodytype = $request->bodytype;
        $country->makeid = $request->makeid;
        $country->save();
        return redirect()->to('/tables/model')->with('success', 'success');
    }


}
