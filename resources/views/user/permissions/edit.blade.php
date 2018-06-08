@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
   Permission
    <small>Edit</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route('permission.index') }}">Permission</a></li>
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
                    <h3 class="box-title">Edit Permission</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{ route('permission.update', ['id' => $permission->id]) }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        {{csrf_field()}}
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <input type="text" class="form-control" name="display_name" id="display_name" value="{{$permission->display_name}}" placeholder="Display Name" required>
                                  <span class="help-block text-red">
                                      @if($errors->has('display_name'))
                                          {{ $errors->first('display_name')}}
                                      @endif
                                  </span>
                              </div>
                            </div>                     
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <input type="text" class="form-control" name="name" id="name" value="{{$permission->name}}" placeholder="Name (Cannot be changed)" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <input type="text" class="form-control" name="description" id="description" placeholder="Describe what this permission does" value="{{$permission->description}}"> 
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
                                                <input name="redirect" type="checkbox" checked> Redirect to permission list after submission
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection