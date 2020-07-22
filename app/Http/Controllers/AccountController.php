<?phpnamespace App\Http\Controllers;use App\AdminInfo;use App\Department;use App\Employee;use App\EmployeeType;use App\Leave;use App\Mail\WelcomeMail;use App\Nationality;use App\Package;use App\Race;use App\Religion;use App\Role;use App\Shift;use App\Supervior;use App\User;use App\UserPackage;use Carbon\Carbon;use foo\bar;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\Support\Facades\DB;use Illuminate\Support\Facades\Hash;use Illuminate\Support\Facades\Mail;use Illuminate\Support\Facades\Session;use PayPal\Api\RedirectUrls;use PhpParser\Internal\PrintableNewAnonClassNode;class AccountController extends Controller{    /**     * Display a listing of the resource.     *     * @return \Illuminate\Http\Response     */    public function request_account()    {        $package=Package::all();        return view('auth.signup',compact('package'));    }    /**     * Show the form for creating a new resource.     *     * @return \Illuminate\Http\Response     */    public function save_request_account(Request $request)    {        $pass=str_random(8);        $user=new User();        $user->name=$request->Name;        $user->lastName=$request->lastName;        $user->phone=$request->Phone;        $user->email=$request->Email;        $user->password=Hash::make($pass);        $user->save();        $user->attachRole('3');        $admin_info=new AdminInfo();        $admin_info->user_id=$user->id;        $admin_info->companyName=$request->companyName;        $admin_info->package=$request->Package;        $admin_info->cardName=$request->cardHolderName;        $admin_info->cardNumber=$request->cardNumber;        $admin_info->cvv=$request->CVV;        $admin_info->expiryDate=$request->expiryDate;        $admin_info->save();        $package=new UserPackage();        $package->user_id=$user->id;        $package->package_id=$request->Package;        $date=Carbon::now();        $package->from=$date->format('m-d-Y');        $package_date=Carbon::now()->addMonths(2);        $package->to=$package_date->format('m-d-Y');        $package_price=Package::where('id',$request->Package)->first();        $package->price=$package_price->price;        $package->save();        $demo = new \stdClass();        $demo->username=$request->Email;        $demo->password=$pass;        $demo->id=$package->id;        Mail::to($request->Email)->send(new WelcomeMail($demo));        return back();    }//    public function test(){//        $demo = new \stdClass();//        $demo->username="Zohab";//        $demo->password="!2312421";//        Mail::to("zohaibazhar359@gmail.com")->send(new WelcomeMail($demo));//    }    /**     * Store a newly created resource in storage.     *     * @param  \Illuminate\Http\Request  $request     * @return \Illuminate\Http\Response     */    public function account_request()    {        $adminInfo=AdminInfo::all();        if (count($adminInfo) > 0){        $account=User::select(DB::raw('*,users.id as u_id'))            ->leftjoin('admin_infos', 'users.id', '=', 'admin_infos.user_id')            ->where('status','=','0')            ->get();        }else{            $account=User::select(DB::raw('*,users.id as u_id'))                ->join('admin_infos', 'users.id', '=', 'admin_infos.user_id')                ->get();        }        return view('Account.request_account',compact('account'));    }    /**     * Display the specified resource.     *     * @param  int  $id     * @return \Illuminate\Http\Response     */    public function update_status(Request $request)    {        User::where('id', '=', $request->id)->update(['status' => 1]);        return back();    }    /**     * Show the form for editing the specified resource.     *     * @param  int  $id     * @return \Illuminate\Http\Response     */    public function employee()    {        $shift=Shift::where('company_id',Auth::user()->id)->get();        $leave=Leave::where('company_id',Auth::user()->id)->get();        $role=Role::whereIn('id',[3,4])->get();        $employeeType=EmployeeType::where('company_id',Auth::user()->id)->get();        $department=Department::where('company_id',Auth::user()->id)->get();        $nationilty=Nationality::where('company_id',Auth::user()->id)->get();        $religion=Religion::where('company_id',Auth::user()->id)->get();        $race=Race::where('company_id',Auth::user()->id)->get();        $supervisor=Supervior::where('company_id',Auth::user()->id)->get();        return view('Employee.create',['shift'=>$shift,'role'=>$role,'leave'=>$leave,'employeeType'=>$employeeType,'department'=>$department,            'nationilty'=>$nationilty,'religion'=>$religion,'race'=>$race,'supervisor'=>$supervisor]);    }    /**     * Update the specified resource in storage.     *     * @param  \Illuminate\Http\Request  $request     * @param  int  $id     * @return \Illuminate\Http\Response     */    public function save_employee(Request $request)    {        $count_employee=Employee::where('company_id',Auth::user()->id)->get();        $package_employee=AdminInfo::select(DB::raw('*'))            ->join('packages', 'packages.id', '=', 'admin_infos.package')            ->where('admin_infos.user_id',Auth::user()->id)            ->first();        if (count($count_employee)<$package_employee->user)        {            $user=new User();            $user->name=$request->name;            $user->lastName=$request->lastName;            $user->phone=$request->Number;            $user->email=$request->email;            $user->status=1;            $user->password=Hash::make(str_random(8));            $user->save();            $user->attachRole('4');            $employee=new Employee();            $employee->name=$request->name;            $employee->company_id=Auth::user()->id;            $employee->user_id=$user->id;            $employee->lastName=$request->lastName;            $employee->email=$request->email;            $employee->confirmationDate=$request->confirmationDate;            $employee->shift=$request->shift;            $employee->leave=$request->leave;            $employee->DOB=$request->DOB;            $employee->DOJ=$request->DOJ;            $employee->Gender=$request->Gender;            $employee->Address=$request->Address;            $employee->employmentType=$request->employmentType;            $employee->martialStatus=$request->martialStatus;            $employee->Department=$request->Department;            $employee->leave=$request->leave;            $employee->Nationality=$request->Nationality;            $employee->Designation=$request->Designation;            $employee->Religion=$request->Religion;            $employee->Race=$request->Race;            $employee->supervisorName=$request->supervisorName;            $employee->bloodGroup=$request->bloodGroup;            $employee->POB=$request->POB;            $employee->Identification=$request->Identification;            if ($request->hasFile('picture')) {                $image = $request->file('picture');                $name = time().'.'.$image->getClientOriginalName();                $destinationPath = public_path('/images');                $image->move($destinationPath, $name);                $employee->picture=$name;            }            $employee->Number=$request->Number;            $employee->Country=$request->Country;            $employee->Postal=$request->Postal;            $employee->Skill=$request->Skill;            $employee->workingHour=$request->workingHour;            $employee->payrollType=$request->payrollType;            $employee->Frequency=$request->Frequency;            $employee->basicPay=$request->basicPay;            $employee->contactName=$request->contactName;            $employee->Relationship=$request->Relationship;            $employee->contactNumber=$request->contactNumber;            $employee->fatherName=$request->fatherName;            $employee->fatherID=$request->fatherID;            $employee->motherName=$request->motherName;            $employee->motherID=$request->motherID;            $employee->spouseName=$request->spouseName;            $employee->spouseID=$request->spouseID;            $employee->childName=$request->childName;            $employee->childID=$request->childID;            $employee->childTwoName=$request->childTwoName;            $employee->childTwoID=$request->childTwoID;            $employee->payMode=$request->payMode;            $employee->Bank=$request->Bank;            $employee->Code=$request->Code;            $employee->accountNumber=$request->accountNumber;            $employee->branchCode=$request->branchCode;            $employee->Remarks=$request->Remarks;            if($employee->save()){                return redirect()->back()->with("success" , "Employee Created Successfully!");            }else{                return redirect()->back()->with("error" , "Employee Error");            }        }else{            dd("3");            return redirect()->back()->with("error" , "Employee User limit complete");        }    }    /**     * Remove the specified resource from storage.     *     * @param  int  $id     * @return \Illuminate\Http\Response     */    public function manage_employee()    {        $employee=Employee::all();        return view('Employee.manage',['employee'=>$employee]);    }    public function update_employee(Request $request)    {        $employee=Employee::where('id','=',$request->id)->get();        $shift=Shift::where('company_id',Auth::user()->id)->get();        $leave=Leave::where('company_id',Auth::user()->id)->get();        return view('Employee.update',['employee'=>$employee,'shift'=>$shift,'leave'=>$leave]);    }    public function edit_employee(Request $request)    {        DB::table('employees')            ->where('id', $request->id)            ->update(['name' => $request->name,'lastName' => $request->lastName,'email' =>$request->email ,'phone' =>$request->phone ,'shift' =>$request->shift ,'DOB' =>$request->DOB ,'DOJ' => $request->DOJ,'Gender' =>$request->Gender ,'Address' =>$request->Address,'leave' =>$request->leave ]);        return redirect()->route('manage_employee');    }    public function delete_employee(Request $request)    {        DB::table('employees')            ->where('id', $request->id)->delete();        return redirect()->route('manage_employee');    }    public static function userName(){       // $companyName=AdminInfo::where('user_id','=',Auth::user()->id)->first()->companyName;        //dd(Session::get('company_id'));//       if(Session::get('company_id') == null){//           return AdminInfo::where('user_id','=',Auth::user()->id)->first()->companyName;//       }else{//           return Session::get('company_id');//       }        return "company";    }    public function package(){        return view('Package.create');    }    public function save_package(Request $request){        $package=new Package();        $package->name=$request->name;        $package->user=$request->user;        $package->price=$request->price;        $package->description=$request->description;        $package->period=$request->period;        $package->save();        if($package->save()){            return redirect()->back()->with("success" , "Package Created Successfully!");        }else{            return redirect()->back()->with("error" , "Package Error");        }    }    public function manage_package(){        $package=Package::all();        return view('Package.manage',compact('package'));    }    public function update_package(Request $request)    {        $package=Package::where('id','=',$request->id)->get();        return view('Package.update',['package'=>$package]);    }    public function edit_package(Request $request)    {        DB::table('packages')            ->where('id', $request->id)            ->update(['name' => $request->name,'price' => $request->price,'period' => $request->period,'description' =>$request->description ,'user' =>$request->user]);        return redirect()->route('manage_package');    }    public function delete_package(Request $request)    {        DB::table('packages')            ->where('id', $request->id)->delete();        return redirect()->route('manage_package');    }    public function payment(Request $request){        if(md5($request->id) != $request->hash){            abort(404);        }else {            $userpackage = UserPackage::where('id', $request->id)->latest('created_at')->first()->package_id;            $package = Package::where('id', $userpackage)->get();            return view('paywithpaypal', ['userpackage' => $userpackage, 'package' => $package]);        }    }}