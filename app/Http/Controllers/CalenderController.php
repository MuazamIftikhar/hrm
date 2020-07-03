<?php

namespace App\Http\Controllers;

use App\ApplyLeave;
use App\AssignEmployee;
use App\Employee;
use App\Scheduling;
use App\Shift;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule=AssignEmployee::where('company_id',Auth::user()->id)->get();
        return view('Calender.index',compact('schedule'));
    }

    public static function get_user_name ($user_id)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function employee_scheduling()
    {
        $shift=Shift::where('company_id',Auth::user()->id)->get();
        return view('Event.index',compact('shift'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_employee_scheduling(Request $request)
    {
        $shift=Shift::where('id',$request->shift)->pluck('shift');

        $applly_leave=ApplyLeave::where('from','<=',$request->date)
            ->where('to','>=',$request->date)->where('status','=',1)->pluck('user_id');

        $employee=Employee::whereNotIn('user_id', $applly_leave)
            ->where('company_id',Auth::user()->id)->where('shift',$request->shift)->take($request->employee_number)->pluck('name');
        $day=Carbon::parse($request->date)->format('l');
        $scheduling=new Scheduling();
        $scheduling->day=$day;
        $scheduling->date=$request->date;
        $scheduling->number=$request->employee_number;
        $scheduling->description=$request->description;
        $scheduling->save();


        $date=date('Y-m-d', strtotime($request->date));
        $assign_employee=new AssignEmployee();
        $assign_employee->company_id=Auth::user()->id;
        $assign_employee->shift=$shift[0];
        $assign_employee->date=$date;
        $assign_employee->user_id=json_encode($employee);
        $assign_employee->save();
        return back();
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
        //
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
