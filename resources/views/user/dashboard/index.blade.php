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
                    <a href="{{ route('role.index') }}">
                        <div class="info-box-content">
                            <span class="info-box-text text-black">Roles</span>
                            <span class="info-box-number text-black">{{ $roles->count() }}</span>
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
                    <a href="{{ route('post.index') }}">
                        <div class="info-box-content">
                            <span class="info-box-text text-black">Posts</span>
                            <span class="info-box-number text-black">{{ $posts->count() }}</span>
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
                        <li><a href="#role" data-toggle="tab" aria-expanded="false">Roles</a></li>
                        <li><a href="#post" data-toggle="tab" aria-expanded="false">Posts</a></li>                        
                        <li class="pull-left header"><i class="fa fa-line-chart"></i> Recent Activities</li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="user">
                            <table class="table no-margin table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fullname</th>
                                    <th>Email Address</th>
                                    <th>active</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->active ? "Yes" : "No" }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="role">
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
                                    @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->display_name }}</td>
                                        <td>{{ $role->description }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="post">
                            <!-- The timeline -->
                            <table class="table no-margin table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Author</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                        @if ($posts->count() > 0)
                                        @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>
                                                @if(!empty($post->image))
                                                <img src="{{ asset('uploads/post_photo/' .  $post->image) }}" alt="{{ $post->title }}" width="100" height="100" >
                                              @endif
                                            </td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ substr(strip_tags($post->contents), 0, 50) }}{{ strlen(strip_tags($post->contents)) > 50 ? "..." : "" }}</td>
                                            <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
                                                        <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                                                        <a href="{{ route('post.destroy', ['id' => $post->id]) }}" class="btn btn-default btn-xs confirm"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                                <th colspan="5" class="text-center">There no published posts yet</th>
                                        </tr>
                                        @endif
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