@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('user.index') }}">User</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        @include('layouts.partials.message')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit User</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ route('user.update', ['id' => $user->id]) }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" placeholder="User Name" required>
                                        <span class="help-block text-red">
                                            @if($errors->has('name'))
                                                {{ $errors->first('name')}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control" placeholder="Email Address" required>
                                        <span class="help-block text-red">
                                            @if($errors->has('email'))
                                                {{ $errors->first('email')}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xm-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password" required>
                                        <span class="help-block text-red">
                                            @if($errors->has('password'))
                                                {{ $errors->first('password')}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xm-12">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control" placeholder="Confirm Password" required>
                                        <span class="help-block text-red">
                                            @if($errors->has('confirm_password'))
                                                {{ $errors->first('confirm_password')}}
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
                                            <label>
                                                <input name="redirect" type="checkbox" checked> Redirect to user list after submission
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