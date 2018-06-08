@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Role
        <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('role.index') }}">Role</a></li>
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
                        <h3 class="boxtitle">Edit Role</h3>
                      </div>
                      <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('role.update', ['id' => $role->id]) }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="display_name" value="{{ old('display_name', $role->display_name) }}" class="form-control" placeholder="Name (Human Readable)" required>
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
                                        <input type="text" name="name" value="{{ old('name', $role->name) }}" class="form-control" placeholder="Slug (can not be edited)" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="description" value="{{ old('description', $role->description) }}" class="form-control" placeholder="Role Description">
                                    </div>
                                </div>
                           </div>                           
                            <div class="row">
                              <div class="col-md-6">
                                <h2>Permissions:</h2>
                                @foreach ($permissions as $permission)
                                <div class="form-group">
                                        <b-form-checkbox id="permissions" value="{{ $permission->id }}" v-model="permissionsSelected" > 
                                        <div class="form-group">
                                      {{ $permission->display_name }} <em> ({{ $permission->description }})</em>
                                        </div>
                                        </b-form-checkbox>
                                </div>
                                @endforeach
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
                                                <input name="redirect" type="checkbox" checked> Redirect to role list after submission
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

@section('vue')
    <script>
      var app = new Vue ({
        el: '#app',
        data: {
            permissionsSelected: {!!$role->permissions->pluck('id')!!}
        }
      });
    </script>
@endsection