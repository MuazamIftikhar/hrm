
@extends('layouts.masterLayout')

@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Add Employee
                    <span class="d-block text-muted pt-2 font-size-sm">Edit and delete the employee</span></h3>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('save_employee') }}">
            @csrf
            <!--begin: Datatable-->
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="lastName" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Enter Email" name="email" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" placeholder="Enter Phone"  name="phone"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date of Joining</label>
                            <input type="date" class="form-control"  name="DOJ" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="Gender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control"  name="DOB" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control"  name="Address" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleSelect2">Office Shift</label>
                            <select class="form-control" name="shift">
                                @foreach($shift as $s)
                                    <option value="{{$s->id}} ">{{$s->shift}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleSelect2">Leave</label>
                            <select class="form-control" name="leave">
                                @foreach($leave as $l)
                                    <option value="{{$l->id}}">{{$l->leave}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <!--end: Datatable-->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </div>
            </form>
        </div>
    </div>
@endsection