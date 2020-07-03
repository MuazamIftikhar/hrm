@extends('layouts.masterLayout')

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">Add Leave</h3>
                </div>
                <!--begin::Form-->
                <form method="POST" action="{{ route('save_leave') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" required placeholder="Enter Name" name="leave" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
        <div class="col-md-4">
            <!--begin::Card-->
            <div class="card card-custom ">
                <div class="card-header">
                    <h3 class="card-title">Add Leave Type</h3>
                </div>
                <!--begin::Form-->
                <form method="POST" action="{{ route('save_leave_type') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Leave</label>
                                    <select class="form-control" name="leave_id">
                                        @foreach($leave as $l)
                                        <option value="{{$l->id}}">{{$l->leave}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type Name</label>
                                    <input type="text" class="form-control" required placeholder="Enter type" name="Type" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> Number of Leave</label>
                                    <input type="text" class="form-control" required placeholder="Enter Leave" name="totalLeave" />
                                </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Period</label>
                                <select class="form-control" name="Period">
                                    <option >Monthly</option>
                                    <option >Yearly</option>
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
            </div>
            <!--end::Card-->
        </div>
    </div>
    {{--<div class="row">--}}
        {{--<div class="col-md-3"></div>--}}
        {{--<div class="col-md-6">--}}
            {{--<div class="card card-custom">--}}
                {{--<div class="card-header flex-wrap py-5">--}}
                    {{--<div class="card-title">--}}
                        {{--<h3 class="card-label">Manage Shift--}}
                            {{--<span class="d-block text-muted pt-2 font-size-sm">Edit and delete the Shift</span></h3>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="card-body">--}}
                    {{--<!--begin: Datatable-->--}}
                    {{--<table class="table table-separate table-head-custom table-checkable" id="kt_datatable">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>Name</th>--}}
                            {{--<th>Actions</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@foreach($shift as $a)--}}
                            {{--<tr>--}}
                                {{--<td>{{$a->shift}}</td>--}}
                                {{--<td><a href="{{route('update_shift',['id'=>$a->id])}}" class="btn btn-success btn-sm"><i class="flaticon2-pen icon-sm"></i></a> <a href="{{route('delete_shift',['id'=>$a->id])}}" class="btn btn-danger btn-sm"><i class="flaticon2-delete icon-sm"></i></a></td>--}}
                                {{----}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                    {{--<!--end: Datatable-->--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection