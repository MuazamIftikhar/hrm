@extends('layouts.masterLayout')

@section('content')

            <div class="row">
                <div class="col-md-6 offset-3">
                    <!--begin::Card-->
                    <div class="card card-custom ">
                        <div class="card-header">
                            <h3 class="card-title">Add Religion</h3>
                        </div>
                        <!--begin::Form-->
                            <form method="POST" action="{{ route('save_religion') }}">
                                @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" required placeholder="Enter Religion" name="name" />
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
                                <h3 class="card-label">Manage Religion
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
                                @foreach($religion as $a)
                                    <tr>
                                        <td>{{$a->name}}</td>
                                        <td><a href="{{route('update_religion',['id'=>$a->id])}}" class="btn btn-success btn-sm"><i class="flaticon2-pen icon-sm"></i></a> <a href="{{route('delete_religion',['id'=>$a->id])}}" class="btn btn-danger btn-sm"><i class="flaticon2-delete icon-sm"></i></a></td>
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