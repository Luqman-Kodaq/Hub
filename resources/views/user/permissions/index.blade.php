@extends('layouts.master')

@section('content')
  
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       Permission
        <small>Directory</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Permissions</li>
    </ol>
</section>

<!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Permission Directory</h3>
                        <div class="box-header-buttons pull-right">
                            <a href="{{ route('permission.create') }}" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> New Permission</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="table" class="table table-hover datatable-exportable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $permission->display_name }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->description }}</td>
                                    <td>{{ date('M j,Y', strtotime($permission->created_at)) }}</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a href="{{ route('permission.show', $permission->id) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('permission.edit', ['id' => $permission->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('permission.destroy', ['id' => $permission->id]) }}" class="btn btn-default btn-xs confirm"><i class="fa fa-trash"></i></a>
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