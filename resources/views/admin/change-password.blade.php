@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-5">
                <h4 class="page-title">Password Change</h4>
            </div>
        </div>
    </div>
    @if (\Session::has('success'))
    <div class="alert alert-success alert-block">
       <button type="button" class="close" data-dismiss="alert">×</button>
       <strong>{{ \Session::get('success') }}</strong>
    </div>
    @endif
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material" method="post" action="/admin/users/password/update">
                      @csrf
                        <div class="form-group">
                            <label class="col-sm-12">Email</label>
                            <div class="col-md-12">
                              <input type="email" name="email" value="{{$user->email}}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Old Password</label>
                            <div class="col-md-12">
                              <input type="password" name="old_password" value="" class="form-control">
                              <span class="error">{{ $errors->first('old_password') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">New Password</label>
                            <div class="col-md-12">
                              <input type="password" name="password" value="" class="form-control">
                              <span class="error">{{ $errors->first('password') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Confirm Password</label>
                            <div class="col-md-12">
                              <input type="password" name="confirm_password" value="" class="form-control">
                              <span class="error">{{ $errors->first('confirm_password') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Change</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
<style media="screen">
  .error {
    color: red;
  }
  .action, .wild, .big-bean {
    display: none;
  }
</style>

@endsection
