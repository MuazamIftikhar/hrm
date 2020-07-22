
@extends('layouts.masterLayout')

@section('content')
        <div class="card card-custom card-transparent">
            <div class="card-body p-0">
                <!--begin: Wizard-->
                <div class="wizard wizard-4" id="kt_wizard_v4" data-wizard-state="step-first" data-wizard-clickable="true">
                    <!--begin: Wizard Nav-->
                    <div class="wizard-nav">
                        <div class="wizard-steps">
                            <!--begin::Wizard Step 1 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">1</div>
                                    <div class="wizard-label">
                                        <div class="wizard-title">Add Information</div>
                                        <div class="wizard-desc">Create Custom Information</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 1 Nav-->
                            <!--begin::Wizard Step 2 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">2</div>
                                    <div class="wizard-label">
                                        <div class="wizard-title">Family Information</div>
                                        <div class="wizard-desc">Setup Your Family Informtion</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 2 Nav-->
                            <!--begin::Wizard Step 3 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">3</div>
                                    <div class="wizard-label">
                                        <div class="wizard-title">Add Payment Information</div>
                                        <div class="wizard-desc">Add Payment Information</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 3 Nav-->
                            <!--begin::Wizard Step 4 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">4</div>
                                    <div class="wizard-label">
                                        <div class="wizard-title">Completed</div>
                                        <div class="wizard-desc">Review and Submit</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 4 Nav-->
                        </div>
                    </div>
                    <!--end: Wizard Nav-->
                    <!--begin: Wizard Body-->
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <div class="card-body p-0">
                            <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                <div class="col-xl-12">
                                    <!--begin: Wizard Form-->
                                    <form class="form mt-0 mt-lg-10" id="kt_form" method="POST" action="{{route('save_employee')}}">
                                    @csrf
                                        <!--begin: Wizard Step 1-->
                                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                            <div class="mb-10 font-weight-bold text-dark">Enter your Account Details</div>
                                            <!--begin::Input-->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">First Name</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="lastName">Last Name</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="lastName" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control form-control-solid form-control-lg" placeholder="Enter Email" name="email" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="DOJ">Joining Date</label>
                                                        <input type="date" class="form-control form-control-solid form-control-lg"  name="DOJ" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="DOB">Date Of Birth</label>
                                                        <input type="date" class="form-control form-control-solid form-control-lg"  name="DOB" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="confirmationDate">Confirmation Date</label>
                                                        <input type="date" class="form-control form-control-solid form-control-lg" name="confirmationDate" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Gender">Gender</label>
                                                        <select class="form-control form-control-solid form-control-lg" name="Gender">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="employmentType">Employment Type</label>
                                                        <select class="form-control form-control-solid form-control-lg" name="employmentType">
                                                            @foreach($employeeType as $e)
                                                                <option value="{{$e->name}} ">{{$e->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleSelect2">Martial Status</label>
                                                        <select class="form-control form-control-solid form-control-lg" name="martialStatus">
                                                            <option >Single</option>
                                                            <option >Married</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Department">Department</label>
                                                        <select class="form-control form-control-solid form-control-lg" name="Department">
                                                            @foreach($department as $e)
                                                                <option value="{{$e->name}} ">{{$e->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="shift">Office Shift</label>
                                                        <select class="form-control form-control-solid form-control-lg" name="shift">
                                                            @foreach($shift as $s)
                                                                <option value="{{$s->id}} ">{{$s->shift}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="leave">Leave</label>
                                                        <select class="form-control form-control-solid form-control-lg" name="leave">
                                                            @foreach($leave as $l)
                                                                <option value="{{$l->id}}">{{$l->leave}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Nationality">Nationality</label>
                                                        <select class="form-control form-control-solid form-control-lg" name="Nationality">
                                                            @foreach($nationilty as $l)
                                                                <option value="{{$l->name}}">{{$l->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Designation">Designation</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" name="Designation" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Religion">Religion</label>
                                                        <select class="form-control form-control-solid form-control-lg" name="Religion">
                                                            @foreach($religion as $r)
                                                                <option value="{{$r->name}}">{{$r->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Race">Race</label>
                                                        <select class="form-control form-control-solid form-control-lg" name="Race">
                                                            @foreach($race as $s)
                                                                <option value="{{$s->name}} ">{{$s->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="supervisorName">Supervisor Name</label>
                                                        <select class="form-control form-control-solid form-control-lg" name="supervisorName">
                                                            @foreach($supervisor as $s)
                                                                <option value="{{$s->name}} ">{{$s->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="bloodGroup">Blood Group</label>
                                                        <select class="form-control form-control-solid form-control-lg" name="bloodGroup">
                                                            <option>A+</option>
                                                            <option>A-</option>
                                                            <option>B+</option>
                                                            <option>B-</option>
                                                            <option>O+</option>
                                                            <option>O-</option>
                                                            <option>AB+</option>
                                                            <option>AB-</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="POB">Place Of Birth</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" name="POB" />

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Identification">Identification </label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" name="Identification" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="picture">Photograph </label>
                                                        <input type="file" class="form-control form-control-solid form-control-lg"  name="picture" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Number">Phone Number</label>
                                                        <input type="number" class="form-control form-control-solid form-control-lg"  name="Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Address">Address </label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg"  name="Address" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleSelect2">Country</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg"  name="Country" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Postal">Postal Code</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg"  name="Postal" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Skill">Skill Set </label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg"  name="Skill" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleSelect2">Working Hour Per day</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg"  name="workingHour" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Payroll type For Employee</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg"  name="payrollType" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Frequency">Pay Frequency </label>
                                                        <select class="form-control form-control-solid form-control-lg" name="Frequency">
                                                            <option>Baic</option>
                                                            <option>Hourly</option>
                                                            <option>Daily</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="basicPay">Basic Pay</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg"  name="basicPay" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="contactName">Emergency Contact Persom</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg"  name="contactName" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Relationship">Relationship </label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg"  name="Relationship" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleSelect2">Emergency Contact Number</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg"  name="contactNumber" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!--end::Input-->
                                        </div>
                                        <!--end: Wizard Step 1-->
                                        <!--begin: Wizard Step 2-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <div class="mb-10 font-weight-bold text-dark">Setup Your Address</div>
                                            <!--begin::Input-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="fatherName">Father Name</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="fatherName" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="fatherID">Id</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="fatherID" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="motherName">Mother Name</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="motherName" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="motherID">Id</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="motherID" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="spouseName">Spouse Name</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="spouseName" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="spouseID">Id</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="spouseID" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="childName">Child 1</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="childName" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="childID">Id</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="childID" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="childTwoName">Child 2</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="childTwoName" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="childTwoID">Id</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="childTwoID" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Wizard Step 2-->
                                        <!--begin: Wizard Step 3-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <div class="mb-10 font-weight-bold text-dark">Enter your Payment Details</div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="payMode">Pay Mode</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="payMode" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Bank">Bank</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="Bank" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Code">Bank Code</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="Code" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="accountNumber">Account number</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="accountNumber" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="branchCode">Bank Branch Code</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" placeholder="Enter Name" name="branchCode" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Wizard Step 3-->
                                        <!--begin: Wizard Step 4-->
                                        <div class="pb-5" data-wizard-type="step-content">
                                            <!--begin::Section-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="Remarks">Remarks</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg"  name="Remarks" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end: Wizard Step 4-->
                                        <!--begin: Wizard Actions-->
                                        <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                            <div class="mr-2">
                                                <button class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                            </div>
                                            <div>
                                                <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                                <button class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">Next Step</button>
                                            </div>
                                        </div>
                                        <!--end: Wizard Actions-->
                                    </form>
                                    <!--end: Wizard Form-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end: Wizard Bpdy-->
                </div>
                <!--end: Wizard-->
            </div>
        </div>
@endsection