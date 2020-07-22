@extends('layouts.masterLayout')

@section('content')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Update Employee type</h3>
            </div>
            <!--begin::Form-->
            @foreach($nationality as $s)
            <form method="POST" action="{{ route('edit_nationality',['id'=>$s->id]) }}">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" value="{{$s->name}}" name="name" />
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