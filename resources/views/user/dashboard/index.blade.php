@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Administrator</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    {{--  <div class="col-md-12">
        @include('layouts.partials.message')
    </div>  --}}

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                    <a href="{{ route('user.index') }}">
                        <div class="info-box-content">
                            <span class="info-box-text text-black">User</span>
                            <span class="info-box-number text-black">{{ $users->count() }}</span>
                        </div>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-teal"><i class="fa fa-briefcase"></i></span>
                    <a href="{{ route('permission.index') }}">
                        <div class="info-box-content">
                            <span class="info-box-text text-black">Permissions</span>
                            <span class="info-box-number text-black">{{ $permissions->count() }}</span>
                        </div>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>

                    <a href="">
                        <div class="info-box-content">
                            <span class="info-box-text text-black">Posts</span>
                            <span class="info-box-number text-black"></span>
                        </div>
                    </a>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li class="active"><a href="#user" data-toggle="tab" aria-expanded="true">Users</a></li>
                        <li><a href="#permission" data-toggle="tab" aria-expanded="false">Permissions</a></li>
                        <li><a href="#banks" data-toggle="tab" aria-expanded="false">Posts</a></li>                        
                        <li class="pull-left header"><i class="fa fa-line-chart"></i> Recent Activities</li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="user">
                            <table class="table no-margin table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Fullname</th>
                                    <th>Email Address</th>
                                    <th>active</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->active ? "Yes" : "No" }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="permission">
                            <!-- The timeline -->
                            <table class="table no-margin table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->display_name }}</td>
                                        <td>{{ $permission->description }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="banks">
                            <!-- The timeline -->
                            <table class="table no-margin table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Phone</th>
                                    <th>Swift Code</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="pfas">
                            <!-- The timeline -->
                            <table class="table no-margin table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Branch</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Phone</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
@endpush

@push('scripts')
    <!-- userLTE dashboard -->
    <script src="{{ asset('bower_components/admin-lte/dist/js/pages/dashboard2.js') }}"></script>
@endpush