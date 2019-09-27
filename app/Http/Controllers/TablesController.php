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
        Bodytype::create([
            'name' => $request->name,
            'name_short' => $request->name_short
        ]);
        return back()->with('success', 'success');
    }

    public function bodyedit($id)
    {
        return view('tables.body_edit', ['body' => Bodytype::find($id)]);
    }

    public function bodysave(Request $request)
    {
        $country = Bodytype::find($request->id);
        $country->name = $request->name;
        $country->image = $request->image;
        $country->save();
        return redirect()->to('/tables/body')->with('success', 'success');
    }

    public function color()
    {
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
            'name_short' => $request->name_short
        ]);
        return back()->with('success', 'success');
    }

    public function coloredit($id)
    {
        return view('tables.Color_edit', ['body' => Color::find($id)]);
    }

    public function colorsave(Request $request)
    {
        $country = Color::find($request->id);
        $country->name = $request->name;
        $country->name_short = $request->name_short;
        $country->save();
        return redirect()->to('/tables/Color')->with('success', 'success');
    }

    public function drive()
    {
        $users = Drive::orderBy('id', 'DESC')->paginate($this->per_page);
        return view('tables.drive', compact('users'));
    }
    public function engine()
    {
        $users = Engine::orderBy('id', 'DESC')->paginate($this->per_page);
        return view('tables.engine', compact('users'));
    }
    public function fuel()
    {
        $users = Fuel::orderBy('id', 'DESC')->paginate($this->per_page);
        return view('tables.fuel', compact('users'));
    }
    public function make()
    {
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

    public function trans()
    {
        $users = Transmission::orderBy('id', 'DESC')->paginate($this->per_page);
        return view('tables.trans', compact('users'));
    }
}
