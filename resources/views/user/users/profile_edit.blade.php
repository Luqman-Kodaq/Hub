@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Profile</a></li>
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
                        <h3 class="box-title">Edit Profile</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ route('user.profile.update') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name <span class="text-red">*</span></span></label>
                                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-control" placeholder="Name" required>
                                        <span class="help-block text-red">
                                            @if($errors->has('name'))
                                                {{ $errors->first('name') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email Address <span class="text-red">*</span></label>
                                        <input type="text" name="email_address" value="{{ old('email_address', auth()->user()->email_address) }}" class="form-control" placeholder="Email Address" required>
                                        <span class="help-block text-red">
                                            @if($errors->has('email_address'))
                                                {{ $errors->first('email_address') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Profile Picture (Aspect Ratio: 1:1)</label>
                                        <input type="file" name="profile_picture" class="form-control" placeholder="Profile Picture">
                                        <span class="help-block text-red">
                                            @if($errors->has('profile_picture'))
                                                {{ $errors->first('profile_picture') }}
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
                                                <input name="redirect" type="checkbox" checked> Redirect to dashboard after submission
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