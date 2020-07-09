@extends('layouts.masterLayout')

@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Manage Package
                    <span class="d-block text-muted pt-2 font-size-sm">Edit and delete the package</span></h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>User</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($package as $a)
                    <tr>
                        <td>{{$a->name}}</td>
                        <td>{{$a->price}}</td>
                        <td>{{$a->user}}</td>
                        <td><a href="{{route('update_package',['id'=>$a->id])}}" class="btn btn-success btn-sm"><i class="flaticon2-pen icon-sm-1x"></i></a> <a href="{{route('delete_package',['id'=>$a->id])}}" class="btn btn-danger btn-sm"><i class="flaticon2-delete icon-sm-1x"></i></a></td>
                        {{----}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
@endsection