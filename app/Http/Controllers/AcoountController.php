<?php

namespace App\Http\Controllers;

use App\AdminInfo;
use App\Employee;
use App\Role;
use App\Shift;
use App\User;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AcoountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function request_account()
    {
        return view('auth.signup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_request_account(Request $request)
    {
        $user=new User();
        $user->name=$request->Name;
        $user->lastName=$request->lastName;
        $user->phone=$request->Phone;
        $user->email=$request->Email;
        $user->password=Hash::make(str_random(8));
        $user->save();
        $user->attachRole('3');
        $admin_info=new AdminInfo();
        $admin_info->user_id=$user->id;
        $admin_info->package=$request->Package;
        $admin_info->cardName=$request->cardHolderName;
        $admin_info->cardNumber=$request->cardNumber;
        $admin_info->cvv=$request->CVV;
        $admin_info->expiryDate=$request->expiryDate;
        $admin_info->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function account_request()
    {
        $account=User::select(DB::raw('*,users.id as u_id'))
            ->join('admin_infos', 'users.id', '=', 'admin_infos.user_id')
            ->where('status','=','0')
            ->get();
        return view('Account.request_account',compact('account'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status(Request $request)
    {
        User::where('id', '=', $request->id)->update(['status' => 1]);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function employee()
    {
        $shift=Shift::all();
        $role=Role::whereIn('id',[3,4])->get();
        return view('Employee.create',['shift'=>$shift,'role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function save_employee(Request $request)
    {
        $employee=new Employee();
        $employee->name=$request->name;
        $employee->lastName=$request->lastName;
        $employee->email=$request->email;
        $employee->phone=$request->phone;
        $employee->shift=$request->shift;
        $employee->DOB=$request->DOB;
        $employee->DOJ=$request->DOJ;
        $employee->Gender=$request->Gender;
        $employee->Address=$request->Address;
        $employee->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_employee()
    {
        $employee=Employee::all();
        return view('Employee.manage',['employee'=>$employee]);
    }
    public function update_employee(Request $request)
    {
        $employee=Employee::where('id','=',$request->id)->get();
        $shift=Shift::all();
        return view('Employee.update',['employee'=>$employee,'shift'=>$shift]);
    }
    public function edit_employee(Request $request)
    {
        DB::table('employees')
            ->where('id', $request->id)
            ->update(['name' => $request->name,'lastName' => $request->lastName,'email' =>$request->email ,'phone' =>$request->phone ,'shift' =>$request->shift ,'DOB' =>$request->DOB ,'DOJ' => $request->DOJ,'Gender' =>$request->Gender ,'Address' =>$request->Address ]);
        return redirect()->route('manage_employee');
    }
    public function delete_employee(Request $request)
    {
        DB::table('employees')
            ->where('id', $request->id)->delete();
        return redirect()->route('manage_employee');
    }
}
