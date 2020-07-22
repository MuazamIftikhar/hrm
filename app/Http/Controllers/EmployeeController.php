<?php

namespace App\Http\Controllers;

use App\Department;
use App\EmployeeType;
use App\Nationality;
use App\Race;
use App\Religion;
use App\Supervior;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\NoArgs;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeType=EmployeeType::where('company_id',Auth::user()->id)->get();
        return view('EmployeeType.create',['employeeType'=>$employeeType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_employee_type(Request $request)
    {
        $employeeType=new EmployeeType();
        $employeeType->company_id=Auth::user()->id;
        $employeeType->name=$request->name;
        $employeeType->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_employee_type(Request $request)
    {
        $employeeType=EmployeeType::where('id','=',$request->id)->get();
        return view('EmployeeType.update',['employeeType'=>$employeeType]);
    }
    public function edit_employee_type(Request $request){
        DB::table('employee_types')
            ->where('id', $request->id)
            ->update(['name' => $request->name]);
        return redirect()->route('employee_type');
    }
    public function delete_employee_type(Request $request)
    {
        DB::table('employee_types')
            ->where('id', $request->id)->delete();
        return redirect()->route('employee_type');
    }
    public function department()
    {
        $department=Department::where('company_id',Auth::user()->id)->get();
        return view('Department.create',['department'=>$department]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_department(Request $request)
    {
        $department=new Department();
        $department->company_id=Auth::user()->id;
        $department->name=$request->name;
        $department->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_department(Request $request)
    {
        $department=Department::where('id','=',$request->id)->get();
        return view('Department.update',['department'=>$department]);
    }
    public function edit_department(Request $request){
        DB::table('departments')
            ->where('id', $request->id)
            ->update(['name' => $request->name]);
        return redirect()->route('department');
    }
    public function delete_department(Request $request)
    {
        DB::table('departments')
            ->where('id', $request->id)->delete();
        return redirect()->route('department');
    }


    public function religion()
    {
        $religion=Religion::where('company_id',Auth::user()->id)->get();
        return view('religion.create',['religion'=>$religion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_religion(Request $request)
    {
        $religion=new Religion();
        $religion->company_id=Auth::user()->id;
        $religion->name=$request->name;
        $religion->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_religion(Request $request)
    {
        $religion=Religion::where('id','=',$request->id)->get();
        return view('Religion.update',['religion'=>$religion]);
    }
    public function edit_religion(Request $request){
        DB::table('religions')
            ->where('id', $request->id)
            ->update(['name' => $request->name]);
        return redirect()->route('religion');
    }
    public function delete_religion(Request $request)
    {
        DB::table('religions')
            ->where('id', $request->id)->delete();
        return redirect()->route('religion');
    }

    public function nationality()
    {
        $nationality=Nationality::where('company_id',Auth::user()->id)->get();
        return view('Nationality.create',['nationality'=>$nationality]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_nationality(Request $request)
    {
        $nationality=new Nationality();
        $nationality->company_id=Auth::user()->id;
        $nationality->name=$request->name;
        $nationality->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_nationality(Request $request)
    {
        $nationality=Nationality::where('id','=',$request->id)->get();
        return view('Nationality.update',['nationality'=>$nationality]);
    }
    public function edit_nationality(Request $request){
        DB::table('nationalities')
            ->where('id', $request->id)
            ->update(['name' => $request->name]);
        return redirect()->route('nationality');
    }
    public function delete_nationality(Request $request)
    {
        DB::table('nationalities')
            ->where('id', $request->id)->delete();
        return redirect()->route('nationality');
    }
    public function race()
    {
        $race=Race::where('company_id',Auth::user()->id)->get();
        return view('Race.create',['race'=>$race]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_race(Request $request)
    {
        $race=new Race();
        $race->company_id=Auth::user()->id;
        $race->name=$request->name;
        $race->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_race(Request $request)
    {
        $race=Race::where('id','=',$request->id)->get();
        return view('Race.update',['race'=>$race]);
    }
    public function edit_race(Request $request){
        DB::table('races')
            ->where('id', $request->id)
            ->update(['name' => $request->name]);
        return redirect()->route('race');
    }
    public function delete_race(Request $request)
    {
        DB::table('races')
            ->where('id', $request->id)->delete();
        return redirect()->route('race');
    }
    public function supervisor_name()
    {
        $supervisor=Supervior::where('company_id',Auth::user()->id)->get();
        return view('Supervisor.create',['supervisor'=>$supervisor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_supervisor_name(Request $request)
    {
        $supervisor=new Supervior();
        $supervisor->company_id=Auth::user()->id;
        $supervisor->name=$request->name;
        $supervisor->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_supervisor_name(Request $request)
    {
        $supervisor=Supervior::where('id','=',$request->id)->get();
        return view('Supervisor.update',['supervisor'=>$supervisor]);
    }
    public function edit_supervisor_name(Request $request){
        DB::table('superviors')
            ->where('id', $request->id)
            ->update(['name' => $request->name]);
        return redirect()->route('supervisor_name');
    }
    public function delete_supervisor_name(Request $request)
    {
        DB::table('superviors')
            ->where('id', $request->id)->delete();
        return redirect()->route('supervisor_name');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
