@extends('layouts.masterLayout')

@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Manage Emplooyee
                    <span class="d-block text-muted pt-2 font-size-sm">Edit and delete the employee</span></h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                <thead>
                <tr>
                    <th>Record ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employee as $a)
                    <tr>
                        <td>{{$a->id}}</td>
                        <td>{{$a->name}}</td>
                        <td>{{$a->email}}</td>
                        <td>{{$a->phone}}</td>
                        <td><a href="{{route('update_employee',['id'=>$a->id])}}" class="btn btn-success"><i class="flaticon2-pen"></i></a> <a href="{{route('delete_employee',['id'=>$a->id])}}" class="btn btn-danger"><i class="flaticon2-delete"></i></a></td>
                        {{----}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
@endsection