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
            <li><a href="{{ route('post_draft.index') }}">Post</a></li>
            <li class="active">View</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="col-xs 12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Post Directory</h3>
              <div class="box-header-buttons pull-right">
                  <a href="{{ route('post.edit' , ['id' => $post->id]) }}" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> Edit Post</a>
              </div>
              @if($post->published == false)
              <div class="form-group">
                        <a href="{{ route('post.publish', ['id' => $post->id]) }}" class="btn btn-default" type="submit" role="button" name="published" value="1"><i class="fa fa-check"></i> Publish</a>
              </div>
              @else
              <div class="form-group">
                <a href="{{ route('post.publish', ['id' => $post->id]) }}" class="btn btn-success" type="submit" role="button" disabled><i class="fa fa-check"></i> Published</a>
              </div>
              @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Media -->
              <div class="media">               
                <div class="media-body">
                  <div class="container">
                  <div class="row">
                    <div class="col-md-8 col-md-offset-1 col-xm-12">
                        @if(!empty($post->image))
                        <img src="{{ $post->image }}" alt="{{ $post->name }}" width="850" height="800" class="media-object">
                        @endif
                        <hr>
                        <p><strong> Published: {{ $post->created_at }}</strong> </p>
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-1 col-xm-12">
                          <h1>{{ $post->title }}</h1>
                          <hr>
                          <i>"{!! $post->excerpt !!}"</i>
                          <hr>
                          <p>{!! $post->contents !!}</p>
                          <hr>
                          <p>Category: {{ $post->category->name }}</p>
                        <div class="tags">
                            @foreach ($post->tags as $tag)
                              <span class="label label-default">{{ $tag->name }}</span>
                            @endforeach
                        </div>                       
                      </div>
                    </div>
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