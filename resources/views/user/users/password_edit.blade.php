@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Account
          <small>Change Password</small>
        </h1>

        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa dashboard"></i> Home</a></li>
          <li><a href="#">Account</a></li>
          <li class="active">Change Password</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
        @include('layouts.partials.message')

        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Change Password</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">

                  <form action="{{ route('admin.password.update') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="row">
                      <div class="col-md-12 col-xm-12">
                        <div class="form-group">
                          <label for="Old Password">Old Password</label>
                          <input type="password" name="old_password" value="{{ old('old_password') }}" class="form-control" placeholder="Old password" required>
                          <span class="help-block text-red">
                              @if($errors->has('old_password'))
                              {{ $errors->first('old_password') }}
                              @endif
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xm-12">
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="New Password" required>
                                <span class="help-block text-red">
                                    @if($errors->has('password'))
                                        {{ $errors->first('password') }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xm-12">
                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="Confirm New Password" required>
                                <span class="help-block text-red">
                                    @if($errors->has('password_confirmation'))
                                        {{ $errors->first('password_confirmation') }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-1">
                        <div class="form-group">
                          <button class="btn btn-primary" type="submit" id="submit">
                              <i class="fa fa-check"></i> Submit
                          </button>
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                      </div>
                      <div class="col-md-11">
                        <div class="form-group">
                          <div class="checkbox">
                            <label for="redirect">
                                <input type="checkbox" name="redirect" checked> Redirect to dashboard after submission
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </form>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection