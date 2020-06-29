@extends('layouts.masterLayout')

@section('content')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Update Shift</h3>
            </div>
            <!--begin::Form-->
            @foreach($shift as $s)
            <form method="POST" action="{{ route('edit_shift',['id'=>$s->id]) }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Enter Shift" value="{{$s->shift}}" name="shift" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Day</label>
                            <select class="form-control select2" id="kt_select2_3" name="Day[]" required multiple="multiple" >
                                @php
                                $days = json_decode($s->day);
                                        @endphp
                                <option {{in_array('Monday',$days) == true ? 'selected' : ''}} value="Monday">Monday</option>
                                <option {{in_array('Tuesday',$days) == true ? 'selected' : ''}} value="Tuesday">Tuesday</option>
                                <option {{in_array('Wednesday',$days) == true ? 'selected' : ''}} value="Wednesday">Wednesday</option>
                                <option {{in_array('Thursday',$days) == true ? 'selected' : ''}} value="Thursday">Thursday</option>
                                <option {{in_array('Friday',$days) == true ? 'selected' : ''}} value="Friday">Friday</option>
                                <option {{in_array('Saturday',$days) == true ? 'selected' : ''}} value="Saturday">Saturday</option>
                                <option {{in_array('Sunday',$days) == true ? 'selected' : ''}} value="Sunday">Sunday</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Time In</label>
                                <input type="time" class="form-control" value="{{$s->time_in}}" name="time_in" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Time Out</label>
                                <input type="time" class="form-control" value="{{$s->time_out}}" required name="time_out" />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </div>
            </form>
            @endforeach
            <!--end::Form-->
        </div>
        <!--end::Card-->

    </div>
</div>
    @endsection