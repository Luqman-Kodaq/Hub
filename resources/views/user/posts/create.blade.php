@extends('layouts.master')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Post
      <small>Add New</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ route('post.index') }}">Post</a></li>
      <li class="active">New</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    
    <div class="row">        
      <div class="col-md-9 col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">New Post</h3>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="row">
                  <div class="col-md-12 col-xm-12">
                    <div class="form-group">
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Post Title" required v-model="title">
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
                     <slug-widget url="{{ url('/') }}" subdirectory="blog" :title="title" @copied="slugCopied" @slug-changed="updateSlug"></slug-widget>                 <input type="hidden" v-model="slug" name="slug"/>
                  </div>
                      <div class="col-md-12 col-xm-12">
                          <div class="form-group">
                              <textarea name="excerpt" id="excerpt" rows="3" class="form-control" placeholder="Excerpt..."></textarea>
                              <span class="help-block text-red">
                                  @if($errors->has('excerpt'))
                                      {{ $errors->first('excerpt')}}
                                  @endif
                              </span>
                          </div>
                      </div>
                      <div class="col-md-4 col-xm-12">
                          <div class="form-group">
                              <input type="file" name="image"  class="form-control">
                          </div>
                      </div>
                      <div class="col-md-12 col-xm-12">
                        <div class="form-group">
                        <select name="category_id" id="category" class="form-control">
                                <option>Choose a category...</option>
                            @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>                    
                    <div class="col-md-12 col-xm-12">
                        <div class="form-group">
                        <select name="tags[]" class="form-control select2-multi" multiple="multiple">
                                <option>Select tag...</option>
                            @foreach($tags as $tag)
                          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                      <div class="col-md-12 col-xm-12">
                          <div class="form-group">
                              <textarea name="contents" id="contents" class="form-control" cols="30" rows="20" placeholder="Compose your piece..."></textarea>
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
          <div class="box">
              <div class="box-header with-border">
                  <h3 class="box-title">Profile</h3>
                  <img src="https://placehold.it/50x50" alt="" class="card-img-top">
                </div>
                <div class="box-body">
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
                    title: '',
                    slug: '',
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
        <script type="text/javascript">
            $(".select2-multi").select2();
          </script>
@endsection