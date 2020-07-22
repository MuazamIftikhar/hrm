@extends('layouts.masterLayout')

@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Account Request
                    <span class="d-block text-muted pt-2 font-size-sm">Accept the account</span></h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Package</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($account as $a)
                <tr>
                    <td>{{$a->name}}</td>
                    <td>{{$a->email}}</td>
                    <td>{{$a->phone}}</td>
                    <td>{{$a->package}}</td>
                    <td><a href="{{route('update_status',['id'=>$a->u_id])}}" class="btn btn-success">add</a></td>
                </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
@endsection