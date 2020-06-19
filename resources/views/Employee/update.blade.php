@extends('layouts.masterLayout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!--begin::Card-->
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Employee Form</h3>
                </div>
                <!--begin::Form-->
                @foreach($employee as $a)
                <form method="POST" action="{{ route('edit_employee',['id'=>$a->id]) }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" value="{{$a->name}}" name="name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Name" value="{{$a->lastName}}" name="lastName" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Email" value="{{$a->email}}" name="email" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" placeholder="Enter Phone" value="{{$a->phone}}"  name="phone"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date of Joining</label>
                                    <input type="date" class="form-control" value="{{$a->DOJ}}"  name="DOJ" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="Gender">
                                        <option {{$a->Gender == "Male" ? "selected" : ""}}>Male</option>
                                        <option {{$a->Gender == "Female" ? "selected" : ""}}>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" class="form-control" value="{{$a->DOB}}"  name="DOB" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" value="{{$a->Address}}"  name="Address" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleSelect2">Office Shift</label>
                                    <select class="form-control" name="shift">
                                        @foreach($shift as $s)
                                            <option value="{{$s->id}}" {{$a->shift == $s->id ? "selected" : ""}}>{{$s->shift}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </form>
                <!--end::Form-->
                    @endforeach
            </div>
        </div>
    </div>
@endsection