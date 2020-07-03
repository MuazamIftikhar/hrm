@extends('layouts.masterLayout')

@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Leave Request
                    <span class="d-block text-muted pt-2 font-size-sm">Accept the Request</span></h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>From</th>
                    <th>to</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($leave as $a)
                    <tr>
                        <td>{{$a->name}}</td>
                        <td>{{$a->email}}</td>
                        <td>{{$a->from}}</td>
                        <td>{{$a->to}}</td>
                        <td><a href="{{route('update_leave_status',['id'=>$a->l_id])}}" class="btn btn-success">Accept </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
@endsection