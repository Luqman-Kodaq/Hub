@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
            <small>Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('user.index') }}">User</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">
                            {{ $user->name }} Profile </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="panel-body">       
                              <div class="col-md-8 col-md-offset-1 col-xm-12 text-center">
                                    @if(!empty($user->profile_photo))
                                    <img src="{{ Storage::url($user->profile_photo) }}" alt="{{ Auth::user()->name }}" width="140px" height="140px" style="border-radius: 50%">
                                  @endif
                              </div>
                              <div class="form-group text-center">
                                  <div class="col-md-8 col-md-offset-1 col-xm-12">
                                      <label for="facebook"><strong>Facebook Id:</strong></label>
                                        <p>{{ $user->profile->facebook }}</p>
                                  </div>
                              </div>
                              <div class="form-group text-center">
                                    <div class="col-md-8 col-md-offset-1 col-xm-12">
                                        <label for="twitter"><strong>Twitter Id:</strong></label>
                                          <p>{{ $user->profile->twitter }}</p>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                        <div class="col-md-8 col-md-offset-1 col-xm-12">
                                            <label for="instagram"><strong>Instagram Id:</strong></label>
                                              <p>{{ $user->profile->instagram }}</p>
                                        </div>
                                </div>
                                <div class="form-group text-center">
                                        <div class="col-md-8 col-md-offset-1 col-xm-12">
                                            <label for="about"><strong>Biography:</strong></label>
                                              <p>{{ $user->profile->about }}</p>
                                        </div>
                                </div>
                                <div class="form-group pull-right">
                                      <div class="col-md-8 col-md-offset-1 col-xm-12">
                                    @if(Auth::id() == $user->id)
                                      <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-info">Edit profile</a>
                                    @endif
                                      </div>
                                </div>
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