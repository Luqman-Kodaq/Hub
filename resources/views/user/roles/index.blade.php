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
        <li class="active">Roles</li>
    </ol>
</section>

<!-- Main content -->
    <section class="content">

        {{--  @include('layouts.partials.message')  --}}

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Role Directory</h3>
                        <div class="box-header-buttons pull-right">
                            <a href="{{ route('role.create') }}" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> New Role</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="table" class="table table-hover datatable-exportable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Display_name</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>{{ date('M j,Y', strtotime($role->created_at )) }}</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="{{ route('role.show', $role->id) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('role.edit', ['id' => $role->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('role.destroy', ['id' => $role->id]) }}" class="btn btn-default btn-xs confirm"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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