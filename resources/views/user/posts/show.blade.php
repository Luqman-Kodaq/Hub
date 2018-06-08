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
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Media -->
              <div class="media">
                <!-- <div class="media-left">
                @if(!empty($post->image))
                  <img src="{{ asset('uploads/post_photo/' .  $post->post_photo) }}" alt="{{ $post->name }}" width="200" height="200" class="media-object">
                @endif
                </div> -->
                <div class="media-body">
                    //
                </div>            
              </div>
              <!-- /.Media -->
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection