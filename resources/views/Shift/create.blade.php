@extends('layouts.masterLayout')

@section('content')

            <div class="row">
                <div class="col-md-6 offset-3">
                    <!--begin::Card-->
                    <div class="card card-custom ">
                        <div class="card-header">
                            <h3 class="card-title">Add Shift</h3>
                        </div>
                        <!--begin::Form-->
                            <form method="POST" action="{{ route('save_shift') }}">
                                @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" required placeholder="Enter Shift" name="shift" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Day</label>
                                        <select class="form-control select2" id="kt_select2_3" name="Day[]" required multiple="multiple">
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Time In</label>
                                            <input type="time" class="form-control" value="09:00" name="time_in" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Time Out</label>
                                            <input type="time" class="form-control" value="23:00" required name="time_out" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </form>
                    </div>
                        <!--end::Form-->
                 </div>
                    <!--end::Card-->

            </div>


            <div class="row mt-5">
                <div class="col-md-6 offset-3">
                    <div class="card card-custom">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Manage Shift
                                    <span class="d-block text-muted pt-2 font-size-sm">Edit and delete the Shift</span></h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($shift as $a)
                                    <tr>
                                        <td>{{$a->shift}}</td>
                                        <td><a href="{{route('update_shift',['id'=>$a->id])}}" class="btn btn-success btn-sm"><i class="flaticon2-pen icon-sm"></i></a> <a href="{{route('delete_shift',['id'=>$a->id])}}" class="btn btn-danger btn-sm"><i class="flaticon2-delete icon-sm"></i></a></td>
                                        {{----}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!--end: Datatable-->
                        </div>
                    </div>
                </div>
            </div>
@endsection