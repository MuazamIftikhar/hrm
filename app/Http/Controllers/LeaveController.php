<?php

namespace App\Http\Controllers;

use App\ApplyLeave;
use App\Employee;
use App\Leave;
use App\LeaveType;
use Carbon\Carbon;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave=Leave::all();
        return view('Leave.create',compact('leave'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_leave(Request $request)
    {
        $leave=new Leave();
        $leave->company_id=Auth::user()->id;
        $leave->leave=$request->leave;
        $leave->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_leave_type(Request $request)
    {
        $leaveType=new LeaveType();
        $leaveType->leave_id=$request->leave_id;
        $leaveType->Type=$request->Type;
        $leaveType->totalLeave=$request->totalLeave;
        $leaveType->Period=$request->Period;
        $leaveType->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apply_leave()
    {
        $company_id=Employee::where('user_id',Auth::user()->id)->first()->company_id;
        $leave=LeaveType::select(DB::raw('*,leave_types.id as l_id'))
            ->join('leaves', 'leave_types.leave_id', '=', 'leaves.id')
            ->where('company_id','=',$company_id)->get();
        return view('Leave.apply',compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function save_apply_leave(Request $request)
    {
        $leave=LeaveType::where('id',$request->leave_id)->first();
        if ($leave->Period == "Monthly" ){
            $apply_leave=ApplyLeave::select(DB::raw('*'))->where('user_id',Auth::user()->id)->where('status','1')->where('month',date('m-Y'))->sum('days');
            if ($leave->totalLeave > $apply_leave){
                $applyLeave=new ApplyLeave();
                $applyLeave->user_id=Auth::user()->id;
                $applyLeave->leave_id=$request->leave_id;
                $applyLeave->days=$request->days;
                $applyLeave->from=$request->date_from;
                $applyLeave->to=$request->date_to;
                $applyLeave->month=Carbon::parse($request->date_from)->format('m-Y');
                $applyLeave->year=Carbon::parse($request->date_from)->format('Y');
                $applyLeave->description=$request->description;
                $applyLeave->save();
                return redirect()->back()->with("success" , "Leave Apply Successfully!");
            }else{
                return redirect()->back()->with("error" , "You already use your Leave!");
            }
        }else{
            $apply_leave=ApplyLeave::select(DB::raw('*'))->where('user_id',Auth::user()->id)->where('status','1')->where('year',date('Y'))->sum('days');
            if ($leave->totalLeave > $apply_leave){
                $applyLeave=new ApplyLeave();
                $applyLeave->user_id=Auth::user()->id;
                $applyLeave->leave_id=$request->leave_id;
                $applyLeave->days=$request->days;
                $applyLeave->from=$request->date_from;
                $applyLeave->to=$request->date_to;
                $applyLeave->month=Carbon::parse($request->date_from)->format('m-Y');
                $applyLeave->year=Carbon::parse($request->date_from)->format('Y');
                $applyLeave->description=$request->description;
                $applyLeave->save();
                return redirect()->back()->with("success" , "Leave Apply Successfully!");
            }else{
                return redirect()->back()->with("error" , "You already use your Leave!");
            }
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function request_leave()
    {
        $leave=ApplyLeave::select(DB::raw('*,apply_leaves.id as l_id'))
            ->join('users', 'apply_leaves.user_id', '=', 'users.id')
            ->where('apply_leaves.status',0)->get();
        return view('Leave.request',compact('leave'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_leave_status(Request $request)
    {
        ApplyLeave::where('id', '=', $request->id)->update(['status' => 1]);
        return back();
    }
}
