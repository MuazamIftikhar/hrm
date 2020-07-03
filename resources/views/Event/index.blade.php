
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
            <form method="POST" action="{{ route('save_employee_scheduling') }}">
            @csrf
            <!--begin: Datatable-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control" placeholder="Enter Name" name="date" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Employee Number</label>
                                <input type="text" class="form-control" placeholder="Enter Number" name="employee_number" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" placeholder="Enter Description" name="description" />
                            </div>
                        </div>
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