<?php

namespace App\Http\Controllers;

use App\Shift;
use Illuminate\Http\Request;
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
        $shift=Shift::all();
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
        $shift->shift=$request->shift;
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
               ->update(['shift' => $request->shift ]);
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
