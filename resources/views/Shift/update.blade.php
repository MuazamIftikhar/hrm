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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Enter Shift" value="{{$s->shift}}" name="shift" />
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