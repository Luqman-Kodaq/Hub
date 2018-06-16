@extends('layouts.master')

@section('headSection')
<!-- Select2-->
  <link href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Profile
        <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('profile.index') }}">Profile</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

  <!-- Main content -->
  <section class="content">
    
    <div class="row">        
      <div class="col-md-9 col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Profile</h3>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <form action="{{ route('profile.update') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                {{ csrf_field() }}
                  <div class="row">
                      <div class="col-md-12 col-xm-12">
                        <div class="form-group">
                            <input type="text" name="facebook" value="" class="form-control" placeholder="Facebook Id" required>
                            <span class="help-block text-red">
                                @if($errors->has('facebook'))
                                    {{ $errors->first('facebook')}}
                                @endif
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xm-12">
                          <div class="form-group">
                              <input type="text" name="twitter" value="" class="form-control" placeholder="Twitter Id" required>
                              <span class="help-block text-red">
                                  @if($errors->has('twitter'))
                                      {{ $errors->first('twitter')}}
                                  @endif
                              </span>
                          </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12 col-xm-12">
                            <div class="form-group">
                                <input type="text" name="instagram" value="" class="form-control" placeholder="Instagram Id" required>
                                <span class="help-block text-red">
                                    @if($errors->has('instagram'))
                                        {{ $errors->first('instagram')}}
                                    @endif
                                </span>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                              <div class="col-md-12 col-xm-12">
                                  <div class="form-group">
                                      <textarea name="about" id="about" class="form-control" cols="30" rows="10" placeholder="About you..."></textarea>
                                      <span class="help-block text-red">
                                          @if($errors->has('about'))
                                              {{ $errors->first('about')}}
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
                                  <i class="fa fa-check"></i> Save Profile
                              </button>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          </div>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="redirect" checked> Redirect to profile after submission
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
      <div class="col-md-3 col-xs-12">
          <div class="box">
              <div class="box-header with-border">
                  <h3 class="box-title">Profile</h3>
                  <img src="" alt="" class="card-img-top">
                </div>
                <div class="box-body">
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection