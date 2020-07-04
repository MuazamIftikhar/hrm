
@extends('layouts.masterLayout')

@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Assign Employee
                    <span class="d-block text-muted pt-2 font-size-sm">Assign the employee through shift</span></h3>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('save_employee_scheduling') }}">
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
                                <label>Date</label>
                                <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" placeholder="Enter Name" name="date" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Employee Number</label>
                                <input type="text" class="form-control" required placeholder="Enter Number" name="employee_number" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" required placeholder="Enter Description" name="description" />
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