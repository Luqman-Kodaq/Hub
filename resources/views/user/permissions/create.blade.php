@extends('layouts.master')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Permission
      <small>Add New</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('permission.index') }}">Permission</a></li>
      <li class="active">New</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">New Permisson</h3>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <form action="{{ route('permission.store') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
              {{csrf_field()}}

                <b-radio-group v-model="permissionType"  name="permission_type">
                  <div class="form-group" style="display: inline-flex;">
                    <b-radio name="permission_type" value="basic">Basic Permission</b-radio>
                    <b-radio name="permission_type" value="crud" style="margin-left: 10px;">Crud Permission</b-radio>
                  </div>
                  <div class="row">
                      <div class="col-md-12 col-xm-12">
                        <div class="form-group" v-if="permissionType == 'basic'" value="basic">
                      <p class="control">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                      </p>
                        </div>
                      </div>
                      <div class="col-md-12 col-xm-12">
                        <div class="form-group" v-if="permissionType == 'basic'" value="basic">
                        <p class="control">
                          <input type="text" class="form-control" name="display_name" id="display_name" placeholder="Display Name">
                        </p>
                        </div>
                      </div>
                      <div class="col-md-12 col-xm-12">
                         <div class="form-group" v-if="permissionType == 'basic'" value="basic">
                         <p class="control">
                            <input type="text" class="form-control" name="description" id="description" placeholder="Describe what this permission does">
                         </p>
                         </div>
                      </div>                           
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-xm-12">
                    <div class="form-group" v-if="permissionType == 'crud'">
                      <input type="text" class="form-control" name="resource" id="resource" v-model="resource" value="resource" placeholder="The name of the resource">
                    </div>
                    </div>
                    <div class="form-group" v-if="permissionType == 'crud'">
                      <b-checkbox-group>
                        <div class="col-md-4 col-xm-12" style="padding-left: 20px; padding-top: 40px;">
                        <div class="form-group">
                        <b-checkbox v-model="crudSelected" value="create">Create</b-checkbox>
                        </div>
                        <div class="form-group">
                          <b-checkbox v-model="crudSelected" value="read">Read</b-checkbox>
                        </div>
                        <div class="form-group">
                          <b-checkbox v-model="crudSelected" value="update">Update</b-checkbox>
                        </div>
                        <div class="form-group">
                          <b-checkbox v-model="crudSelected" value="delete">Delete</b-checkbox>
                        </div>
                        </div>
                      </b-checkbox-group>

                      <input type="hidden" name="crud_selected" :value="crudSelected">

                      <div class="col-md-6 col-xm-12">
                        <table class="table" v-if="resource.length >= 3 && crudSelected.length > 0">
                          <thead>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Description</th>
                          </thead>
                          <tbody>
                            <tr v-for="item in crudSelected">
                              <td v-text="crudName(item)"></td>
                              <td v-text="crudDisplay(item)"></td>
                              <td v-text="crudDescription(item)"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
                </b-radio-group>
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
                                      <input type="checkbox" name="redirect" checked> Redirect to users after submission
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
        permissionType: 'basic',
        resource: '',
        crudSelected: ['create', 'read', 'update', 'delete']
      },
      methods: {
        crudName: function(item) {
          return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
        },
        crudDisplay: function(item) {
          return item.toLowerCase() + "-" + app.resource.toLowerCase();
        },
        crudDescription: function(item) {
          return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
        }
      }
    });
  </script>
@endsection