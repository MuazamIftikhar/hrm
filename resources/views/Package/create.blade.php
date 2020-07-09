
@extends('layouts.masterLayout')

@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">Add Package
                    <span class="d-block text-muted pt-2 font-size-sm">Add Dyanamic Package</span></h3>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('save_package') }}">
            @csrf
            <!--begin: Datatable-->
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User</label>
                                <input type="text" class="form-control" placeholder="Enter User" name="user" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" placeholder="Enter Price" name="price" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Period (In Month)</label>
                                <input type="text" class="form-control" placeholder="Enter Period" name="period" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" placeholder="Enter Description" name="description" />
                            </div>
                        </div>
                    </div>

                </div>
                <!--end: Datatable-->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection