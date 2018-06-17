@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Settings
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Settings</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Settings</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form action="{{ route('setting.update', ['id' => $settings->id]) }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="site_name" value="{{ old('site_name', $settings->site_name) }}" class="form-control" placeholder="Site Name" required>
                                        <span class="help-block text-red">
                                            @if($errors->has('site_name'))
                                                {{ $errors->first('site_name')}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="address" value="{{ old('address', $settings->address) }}" class="form-control" placeholder="Address" required>
                                        <span class="help-block text-red">
                                            @if($errors->has('address'))
                                                {{ $errors->first('address')}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xm-12">
                                    <div class="form-group">
                                        <input type="text" name="contact_us" value="{{ old('contact_us', $settings->contact_us) }}" class="form-control" placeholder="Our Number" required>
                                        <span class="help-block text-red">
                                            @if($errors->has('contact_us'))
                                                {{ $errors->first('contact_us')}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xm-12">
                                    <div class="form-group">
                                        <input type="text" name="contact_email" value="{{ old('contact_email', $settings->contact_email) }}" class="form-control" placeholder="Our Email Address" required>
                                        <span class="help-block text-red">
                                            @if($errors->has('contact_email'))
                                                {{ $errors->first('contact_email')}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xm-12">
                                        <div class="form-group">
                                            <label for="about">About Us</label>
                                            <textarea name="about_us" id="about" class="form-control" cols="30" rows="10">{{ $settings->about_us }}</textarea>
                                            <span class="help-block text-red">
                                                @if($errors->has('about_us'))
                                                    {{ $errors->first('about_us')}}
                                                @endif
                                            </span>
                                        </div>
                                  </div>
                                  <div class="col-md-12 col-xm-12">
                                          <div class="form-group">
                                              <label for="service">Our Services</label>
                                              <textarea name="our_services" id="services" class="form-control" cols="30" rows="10">{{ $settings->our_services }}</textarea>
                                              <span class="help-block text-red">
                                                  @if($errors->has('aboout_us'))
                                                      {{ $errors->first('about_us')}}
                                                  @endif
                                              </span>
                                          </div>
                                    </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit" id="submit">
                                            <i class="fa fa-check"></i> Update Settings
                                        </button>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input name="redirect" type="checkbox" checked> Redirect to Settings after submission
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