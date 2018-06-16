@extends('layouts.master')

@section('content')
	 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>Directory</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">User Directory</h3>
                        <div class="box-header-buttons pull-right">
                                <a href="{{ route('user.create') }}" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> New User</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="table" class="table table-hover datatable-exportable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Active</th>
                                <th>Created At</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->active ? "Yes" : "No" }}</td>
                                    <td>{{ date('M j, Y', strtotime($user->created_at)) }}</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('user.destroy', ['id' => $user->id]) }}" class="btn btn-default btn-xs confirm"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="pull-right">
                        {!! $users->links(); !!}
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
