<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        request()->session()->forget('menu');
        request()->session()->put('menu', 'calendar');
        if (Auth::user()->hasRole('super')) {
            $tasks = Task::all();
        } else {
            $tasks = Task::where('userid', '=', Auth::user()->id)->get();
        }
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        // return view('tasks.create', compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'success');
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
        if (!Auth::user()->hasRole('super')) {
            if (!\App\Task::where('userid', '=', Auth::user()->id)->find($id)) {
                return back()->with('error','Not Allow');
            }
        }
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
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
        $task = Task::find($id);
        $input = $request->all();

        if ($task->update($input)) {
            return redirect()->route('tasks.index')->with('success', 'แก้ไขข้อมูลสำเร็จ');
        }
        return back()->with('error', 'แก้ไขข้อมูลไม่สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $task = Task::find($request->id);
        $task->delete();
    }

    public function updated(Request $request)
    {
        $tasks = Task::find($request->id);
        $tasks->task_date = $request->start;
        $tasks->save();
    }

    public function destroy($id)
    {
        $user = Task::find($id);
        if (is_null($user)) {
            return back()->with('error', 'ไม่พบรายการนี้ในระบบ');
        }
        if ($user->delete()) {
            $tasks = Task::all();
            return view('tasks.index', compact('tasks'));
        }
        return back()->with('error', 'ลบข้อมูลไม่สำเร็จ');
    }
}
