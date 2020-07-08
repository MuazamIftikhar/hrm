<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Leave;
use App\LeaveType;
use App\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shift=Shift::where('company_id',Auth::user()->id)->get();
        return view('Shift.create',['shift'=>$shift]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_shift(Request $request)
    {
        $shift=new Shift();
        $shift->company_id=Auth::user()->id;
        $shift->shift=$request->shift;
        $shift->day=json_encode($request->Day);
        $shift->time_in=$request->time_in;
        $shift->time_out=$request->time_out;
        $shift->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_shift(Request $request)
    {
        $shift=Shift::where('id','=',$request->id)->get();
        return view('Shift.update',['shift'=>$shift]);
    }
    public function edit_shift(Request $request){
           DB::table('shifts')
               ->where('id', $request->id)
               ->update(['shift' => $request->shift,'day' => json_encode($request->Day),'time_in' => $request->time_in,'time_out' => $request->time_out]);
           return redirect()->route('shift');
       }
    public function delete_shift(Request $request)
    {
        DB::table('shifts')
            ->where('id', $request->id)->delete();
        return redirect()->route('shift');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
