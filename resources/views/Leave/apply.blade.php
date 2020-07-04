@extends('layouts.masterLayout')

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!--begin::Card-->
            <div class="card card-custom ">
                <div class="card-header">
                    <h3 class="card-title">Apply Leave</h3>
                </div>
                <!--begin::Form-->
                <form method="POST" action="{{route('save_apply_leave')}}">
                    @csrf
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
                                    <label>Leave</label>
                                    <select class="form-control" name="leave_id">
                                        @foreach($leave as $l)
                                            <option value="{{$l->l_id}}">{{$l->Type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Days</label>
                                    <input type="text" class="form-control" required  placeholder="Enter Days" name="days" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date From</label>
                                    <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" required name="date_from" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date To</label>
                                    <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" required  name="date_to" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" required  placeholder="Enter Description" name="description" />
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
@endsection