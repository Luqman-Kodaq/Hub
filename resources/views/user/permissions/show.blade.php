@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Permission
        <small>Directory</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('permission.index') }}">Permission</a></li>
        <li class="active">View</li>
    </ol>
</section>

<section class="content">
    <div class="box">
      <div class="col-xs 12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Permission Directory</h3>
            <div class="box-header-buttons pull-right">
                <a href="{{ route('permission.edit' , ['id' => $permission->id]) }}" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> Edit Permission</a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- Media -->
            <div class="media">              
              <div class="media-body">
                  <label for="Name"><strong>Name</strong></label>
                  <div>
                    <p>{{ $permission->name }}</p>
                  </div>
                  <label for="Display Name"><strong>Display Name</strong></label>
                  <div>
                    <p>{{ $permission->display_name }}</p>
                  </div>
                  <label for="Description"><strong>Description</strong></label>
                  <div>
                    <p>{{ $permission->description }}</p>
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