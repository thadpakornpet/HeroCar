<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\TypeOfUser;
use App\User;
use App\Logs;
use App\am;
use Auth;
use DB;
use Illuminate\Http\Request;
use DateTime;
use Mail;
use Illuminate\Support\Str;
use App\Profiles;
use Illuminate\Support\Facades\Hash;
use App\Roles;
use App\Permissions;
use App\RolesHas;
use App\PermissionsHas;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:super', 'permission:ALL-Plivilege|VIEW-Only'])->except(['edit','get_amphures','get_dis','update']);
    }

    protected $per_page = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'user');
        if (Auth::user()->hasRole('user')) {
            return redirect()->to('/');
        } else {
            $users = User::orderBy('id', 'DESC')->paginate($this->per_page);
            return view('users.index', compact('users'));
        }
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->typeofuser_1->name == 'user') {
            return redirect()->to('/');
        } else {
            $user = new User();
            $types = typeofuser::pluck('name', 'id');
            $provinces = DB::table('provinces')->get()->toArray();
            return view('users.create', compact('user', 'types', 'provinces'));
        }
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $input = $request->all();
        $user = new User($input);
        $user->password = bcrypt($input['password']);
        if ($user->save()) {
            $log = [
                'userid' => Auth::user()->id,
                'remark' => 'add user id :' . $user->id,
                'ipaddress' => $request->ip(),
                'agent' => $_SERVER['HTTP_USER_AGENT'],
            ];
            $Logs = new Logs($log);
            $Logs->save();
            return redirect()->route('users.index')->with('success', 'เพิ่มข้อมูลสำเร็จ');
        }
        return back()->with('error', 'เพิ่มข้อมูลไม่สำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $mails = \App\Emails::where('userid', '=', $id)->get();
        if (is_null($user)) {
            return back()->with('error', 'ไม่พบรายการนี้ในระบบ');
        }

        return view('users.show', compact('user', 'mails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->hasRole('super') || Auth::user()->hasPermissionTo('VIEW-Only')) {
            if ($id != Auth::user()->id) {
                return back()->with('error', 'Permission not access');
            }
        }
        request()->session()->forget('menu');
        request()->session()->put('menu', 'profile');
        $user = User::find($id);
        $roles = Roles::all();
        $permissions = Permissions::all();
        $provinces = DB::table('provinces')->get()->toArray();
        return view('users.update', compact('user', 'provinces', 'roles', 'permissions'));
    }

    public function roles(Request $request)
    {
        if (trim($request->old_role) <> "") {
            $roles = User::find($request->id)->hasRole($request->old_role);
            if ($roles) {
                User::find($request->id)->removeRole($request->old_role);
            }
        }
        if (trim($request->old_permission) <> "") {
            $permissions = User::find($request->id)->hasPermissionTo($request->old_permission);
            if ($permissions) {
                User::find($request->id)->revokePermissionTo($request->old_permission);
            }
        }
        User::find($request->id)->assignRole($request->roles)->givePermissionTo($request->permissions);

        return redirect()->to('/users')->with('success', 'success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        $profile = Profiles::find($id);
        if (!empty($profile)) {
            $profile->update($input);
        } else {
            $NewProfile = new Profiles($input);
            $NewProfile->save();
        }
        if ($user->update($input)) {
            $log = [
                'userid' => Auth::user()->id,
                'remark' => 'edit userid :' . $id,
                'ipaddress' => $request->ip(),
                'agent' => $_SERVER['HTTP_USER_AGENT'],
            ];
            $Logs = new Logs($log);
            $Logs->save();
            if (Auth::user()->hasRole('super')) {
                return redirect()->route('users.index')->with('success', 'แก้ไขข้อมูลสำเร็จ');
            } else {
                return redirect()->back()->with('success', 'แก้ไขข้อมูลสำเร็จ');
            }
        }
        return back()->with('error', 'แก้ไขข้อมูลไม่สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $user = User::find($id);
        if (is_null($user)) {
            return back()->with('error', 'ไม่พบรายการนี้ในระบบ');
        } else {
            DB::table('users')->where('id', $id)->update([
                'status' => 1
            ]);
            $log = [
                'userid' => Auth::user()->id,
                'remark' => 'delete user id :' . $id,
                'ipaddress' => $request->ip(),
                'agent' => $_SERVER['HTTP_USER_AGENT'],
            ];
            $Logs = new Logs($log);
            $Logs->save();
            return back()->with('success', 'ลบข้อมูลสำเร็จ');
        }
        return back()->with('error', 'ลบข้อมูลไม่สำเร็จ');
    }

    public function get_amphures(Request $req)
    {
        $district = DB::table('provinces')->where('provinces.name_th', $req->input('province'))->get();
        $data = DB::table('amphures')->where('amphures.province_id', $district[0]->id)->get();
        return $data;
    }

    public function get_dis(Request $req)
    {
        $amphures = DB::table('amphures')->where('amphures.name_th', $req->input('district'))->get();
        $data = DB::table('districts')->where('districts.amphure_id', $amphures[0]->id)->get();
        return $data;
    }

    public function logs()
    {
        $users = User::orderBy('id', 'DESC')->paginate($this->per_page);
        return view('users.index_logs', compact('users'));
    }

    public function invite(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if (!$user) {
            $token = Str::random(150);
            //หากไม่มีอีเมล์นี้ในระบบ
            $data = ['url' => env('APP_URL') . '/email/invited/' . $token];
            Mail::send('mail_invite', $data, function ($message) use ($request) {
                $message->to($request->email, $request->email)->subject('Invited to register');
                $message->from(env('MAIL_USERNAME'), env('MAIL_USERNAME'));
            });
            User::create([
                'email' => $request->email,
                'password' => $token,
                'invite' => date('Y-m-d H:i:s'),
                'status' => 2
            ])->assignRole($request->type);

            if (app()->getLocale() == 'th') {
                return back()->with('success', 'ส่งคำเชิญสมัครสมาชิกเรียบร้อยแล้ว');
            } else {
                return back()->with('success', 'Your invitation to membership has been sent');
            }
        } else {
            //ห่ากพบอีเมล์นี้ในระบบ
            if (app()->getLocale() == 'th') {
                return back()->with('error', 'ตรวจสอบพบอีเมล์นี้ในระบบแล้ว');
            } else {
                return back()->with('error', 'This email is duplicated in the system');
            }
        }
    }

    public function invited($token)
    {
        $user = User::where('password', '=', $token)->first();
        $provinces = DB::table('provinces')->get()->toArray();
        if ($user) {
            return view('invited', compact('user', 'provinces'));
        }
        if (app()->getLocale() == 'th') {
            abort(403, 'ไม่สามารถเข้าถึงได้ กรุณาตรวจสอบอีเมล์อีกครั้ง');
        } else {
            abort(403, 'Authorization not access, please check email again');
        }
    }

    public function registerinvate(Request $request)
    {
        if ($request->password == $request->password_confirmation && strlen($request->password) > 5) {
            $user = User::where('email', '=', $request->email)->where('password', '=', $request->token)->first();
            if ($user) {
                $user->name = $request->name;
                $user->password = Hash::make($request->password);
                $user->typeuser = 'Invite';
                $user->status = '0';
                $user->register = date('Y-m-d H:i:s');
                $user->save();

                return redirect()->to('/');
            } else {
                if (app()->getLocale() == 'th') {
                    return back()->with('error', 'ข้อมูลการเชิญชวนไม่ถูกต้อง');
                } else {
                    return back()->with('error', 'Not found invite data');
                }
            }
        } else {
            return back()->with('error', 'error');
        }
    }
}
