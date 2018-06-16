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
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="table" class="table table-hover datatable-exportable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Created At</th>
                                <th class="text-right">Actions</th>
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
                    <!-- /.box-body -->
                </div>
                <div class="pull-right">
                        {!! $posts->links(); !!}
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
