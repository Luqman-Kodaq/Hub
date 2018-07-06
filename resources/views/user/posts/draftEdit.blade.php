@extends('layouts.master')

@section('headSection')
<!-- Select2-->
  <link href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Post
        <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('post_draft.index') }}">Post</a></li>
        <li class="active">Edit</li>
    </ol>
</section>

  <!-- Main content -->
  <section class="content">
    
    <div class="row">        
      <div class="col-md-9 col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Post</h3>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <form action="{{ route('post.update', ['id' => $post->id ]) }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="row">
                  <div class="col-md-12 col-xm-12">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Post Title" v-model="title">
                        <span class="help-block text-red">
                            @if($errors->has('title'))
                                {{ $errors->first('title')}}
                            @endif
                        </span>
                    </div>
                    </div>
                </div>
                <div class="row">
                        <div class="form-group">
                                <slug-widget url="{{ url('/') }}" subdirectory="blog" :title="title" @copied="slugCopied" @slug-changed="updateSlug"></slug-widget>
                                <input type="hidden" v-model="slug" name="slug"/>
                        </div>
                        <div class="col-md-12 col-xm-12">
                        <div class="form-group">
                            <input type="text" name="slug" class="form-control" v-model="slug" value="{{ old('slug', $post->slug) }}" disabled>
                        </div>
                        </div>
                      <div class="col-md-12 col-xm-12">
                          <div class="form-group">
                              <textarea name="excerpt" id="excerpt" rows="3" class="form-control" placeholder="Excerpt...">{{ $post->excerpt }}</textarea>
                              <span class="help-block text-red">
                                  @if($errors->has('excerpt'))
                                      {{ $errors->first('excerpt')}}
                                  @endif
                              </span>
                          </div>
                      </div>
                      <div class="col-md-4 col-xm-12">
                          <div class="form-group">
                              <input type="file" name="image" value="{{ old('image', $post->image) }}"  class="form-control">
                          </div>
                      </div>
                      <div class="col-md-12 col-xm-12">
                        <div class="form-group">
                        <select name="category_id" id="category" class="form-control">
                                <option>Choose a category...</option>
                            @foreach($categories as $category)
                          <option value="{{ $category->id }}"@if($post->category->id == $category->id ) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>                    
                    <div class="col-md-12 col-xm-12">
                            <div class="form-group">
                                <select name="tags[]" class="form-control select2-multi" multiple="multiple" data-placeholder="Select tag...">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" 
                                        @foreach ($post->tags as $postTag)
                                             @if($postTag->id == $tag->id) selected @endif @endforeach>{{ $tag->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                      <div class="col-md-12 col-xm-12">
                          <div class="form-group">
                              <textarea name="contents" id="contents" class="form-control" cols="30" rows="20" placeholder="Compose your piece...">{{ $post->contents }}</textarea>
                              <span class="help-block text-red">
                                  @if($errors->has('contents'))
                                      {{ $errors->first('contents')}}
                                  @endif
                              </span>
                          </div>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-md-2">
                          <div class="form-group">
                              <button class="btn btn-primary" type="submit" id="submit">
                                  <i class="fa fa-check"></i> Save Draft
                              </button>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          </div>
                      </div>
                      <div class="col-md-2">
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
                      <div class="col-md-8">
                          <div class="form-group">
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="redirect" checked> Redirect to profile after submission
                                  </label>
                              </div>                              
                          </div>
                      </div>
                  </div>
                  <div class="clearfix"></div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-xs-12">
        <div class="thumbnail" style="border-radius: 5%">
          <img src="{{ Storage::url(Auth::user()->profile_photo) }}" alt="{{ Auth::user()->name }}" style="border-radius: 5%">
          <span class="hidden-xs"></span>
          <div class="caption form-group">
          <div class="form-group text-center">
            <h3><strong>{{ Auth::user()->name }}</strong></h3>
            <p>{{ Auth::user()->profile->about }}</p>
          </div>
          <div class="form-group">
           <a href="{{ route('post.index') }}" class="btn btn-sm btn-info btn-block pull-right" role="button" style=""> <i class="fa fa-"></i> Cancel</a>
          </div>
    </div>
  </div>    
</div>
    </div>
    <!-- /.row -->
@endsection
@section('vue')
<script>
        var app = new Vue({
            el: '#app',
            data: {
                title: '{!! old('title', $post->title) !!}',
                slug: '{{ old('slug', $post->slug) }}',
                api_token: '{{Auth::user()->api_token}}'
            },
            methods: {
                updateSlug: function(val) {
                  this.slug = val;
                },
                slugCopied: function(type, msg, val) {
                  notifications.toast(msg, {type: `is-${type}`});
                }
              }
        });
    </script>
    <!-- Select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
      $(".select2-multi").select2();
    });
  </script>
@endsection