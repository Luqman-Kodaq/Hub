@extends('layouts.master')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Role
      <small>Add New</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('role.index') }}">Role</a></li>
      <li class="active">New</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">New Role</h3>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <form action="{{ route('role.store') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="row">
                  <div class="col-md-12 col-xm-12">
                    <div class="form-group">
                        <input type="text" name="display_name" value="{{ old('display_name') }}" class="form-control" placeholder="Role Name ('Human Readable')" required>
                        <span class="help-block text-red">
                            @if($errors->has('display_name'))
                                {{ $errors->first('display_name')}}
                            @endif
                        </span>
                    </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-12 col-xm-12">
                            <div class="form-group">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Slug (Can not be edited)" required>
                                <span class="help-block text-red">
                                    @if($errors->has('name'))
                                        {{ $errors->first('name')}}
                                    @endif
                                </span>
                            </div>
                        </div>               
                    </div>
                <div class="row">
                      <div class="col-md-12 col-xm-12">
                          <div class="form-group">
                              <input type="text" name="description" value="{{ old('description') }}" class="form-control" placeholder="Enter description" required>
                              <span class="help-block text-red">
                                  @if($errors->has('description'))
                                      {{ $errors->first('description')}}
                                  @endif
                              </span>
                          </div>
                      </div>               
                  </div>
                  <input type="hidden" :value="permissionsSelected" name="permissions">
                  <div class="row">
                        <div class="col-md-12 col-xm-12">
                            <div class="form-group">
                                <ul>
                                        <h2>Permissions:</h2>                                    
                                        @foreach ($permissions as $permission)
                                        <div class="form-group">
                                        <b-form-group>
                                            <b-form-checkbox-group id="permissions" name="permissions" v-model="permissionsSelected">
                                                <b-form-checkbox value="{{ $permission->id }}">
                                              {{ $permission->display_name }} <em> ({{ $permission->description }})</em>
                                                </b-form-checkbox>
                                            </b-form-checkbox-group>
                                        </b-form-group>
                                        </div>
                                        @endforeach
                                </ul>
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
                                      <input type="checkbox" name="redirect" checked> Redirect to roles after submission
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

@section('vue')
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                permissionsSelected: []
            }
        });
    </script>
@endsection