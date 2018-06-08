@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Role
        <small>Directory</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('role.index') }}">Role</a></li>
        <li class="active">View</li>
    </ol>
</section>

<section class="content">
    <div class="box">
      <div class="col-xs 12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Role Directory</h3>
            <div class="box-header-buttons pull-right">
                <a href="{{ route('role.edit' , ['id' => $role->id]) }}" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> Edit Role</a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- Media -->
            <div class="media">              
              <div class="media-body">
                <div>
                  <label for="Name"><strong>Name</strong></label>
                </div>
                <ul>{{ $role->display_name }}</ul>
                  <label for="Permissions"><strong>Permissions:</strong></label>
                  <div>
                    <ul>
                      @foreach ($role->permissions as $r)
                        <li>{{ $r->display_name }} <em>({{$r->description}})</em></li>
                        @endforeach
                    </ul>
                  </div>               
              </div>            
            </div>
            <!-- /.Media -->
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection