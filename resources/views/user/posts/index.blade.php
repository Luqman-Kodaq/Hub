@extends('layouts.master')

@section('content')
	 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Post
            <small>Directory</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Post</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Post Directory</h3>
                        <div class="box-header-buttons pull-right">
                                <a href="{{ route('post.create') }}" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> New Post</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="table" class="table table-hover datatable-exportable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Created At</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->user_id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ substr(strip_tags($post->contents), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
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
