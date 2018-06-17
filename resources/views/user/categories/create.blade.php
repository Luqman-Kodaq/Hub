@extends('layouts.master')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Category
      <small>Add New</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('category.index') }}">Category</a></li>
      <li class="active">New</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">New Category</h3>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <form action="{{ route('category.store') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="row">
                  <div class="col-md-12 col-xm-12">
                    <div class="form-group">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Category Name" required>
                        <span class="help-block text-red">
                            @if($errors->has('name'))
                                {{ $errors->first('name')}}
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
                                      <input type="checkbox" name="redirect" checked> Redirect to categories after submission
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
@endsection