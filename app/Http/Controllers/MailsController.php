<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;

class MailsController extends Controller
{
    public function index()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'mailllogs');
        if (!Auth::user()->hasRole('super')) {
            $mails = \App\Emails::where('userid', '=', Auth::user()->id)->get();
        } else {
            $mails = \App\Emails::all();
        }
        return view('mails', [
            'mails' => $mails,
        ]);
    }

    public function send(Request $request)
    {

        if(implode(',',$request->to) == "other"){
            $toemail = explode(',',$request->emails);
        } else {
            $toemail = $request->to;
        }

        //return $to;

        $remark = 'Send from system';
        if($request->details != ""){
          $remark = $request->details;
        }

        $data = ['data' => $remark];



        if ($request->file('files')) {
            $filename = time() . str_random(10) . '.' . $request->file('files')->getClientOriginalExtension();
            $request->file('files')->move(public_path() . '/email/', $filename);
            chmod(public_path() . '/email/' . $filename, 0777);

            try {
                Mail::send('mail_templete', $data, function ($message) use ($toemail, $filename, $request) {
                    $message->to($toemail, $toemail)->subject($request->subject);
                    $message->attach($_SERVER['DOCUMENT_ROOT'] . '/public/email/' . $filename);
                    $message->from(env('MAIL_USERNAME'), env('MAIL_USERNAME'));
                });
            } catch (Exception $ex) {
                echo $ex;
            }
        } else {
            try {
                Mail::send('mail_templete', $data, function ($message) use ($toemail, $request) {
                    $message->to($toemail, $toemail)->subject($request->subject);
                    $message->from(env('MAIL_USERNAME'), env('MAIL_USERNAME'));
                });
                $filename = '';
            } catch (Exception $ex) {
                echo $ex;
            }
        }
        \App\Emails::create([
                'userid' => Auth::user()->id,
                'fromemail' => env('MAIL_USERNAME'),
                'toemail' => json_encode($toemail),
                'title' => $request->subject,
                'attachment' => $filename,
                'remark' => $remark
            ]);

        if (app()->getLocale() == 'th') {
            return back()->with('success', 'ส่งอีเมล์เรียบร้อยแล้ว');
        } else {
            return back()->with('success', 'Send success');
        }
    }

    public function getDownload($filename)
    {
        return response()->download(public_path('email/' . $filename));
    }

    public function inbox($id)
    {
        if (!Auth::user()->hasRole('super')) {
          if(!\App\Emails::where('userid','=',Auth::user()->id)->find($id)){
              return back()->with('error','Not allow');
          }
        }
        $inbox = \App\Emails::find($id);
        return view('inbox', compact('inbox'));
    }
}
