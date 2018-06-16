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
            <li><a href="{{ route('user.index') }}">User</a></li>
            <li class="active">View</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="col-xs 12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Directory</h3>
              <div class="box-header-buttons pull-right">
                  <a href="{{ route('user.edit' , ['id' => $user->id]) }}" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> Edit User</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Media -->
              <div class="media">
                <div class="media-body">
                    @if(!empty($user->profile_photo))
                    <img src="{{ asset('uploads/profile_photo/' .  $user->profile_photo) }}" alt="{{ $user->name }}" width="70" height="70" class="media-object" style="border-radius: 50%">
                  @endif
                  </div>
                    <label for="Name"><strong>Name</strong></label>
                    <div>
                      <p>{{ $user->name }}</p>
                    </div>
                    <label for="Email"><strong>Email</strong></label>
                    <div>
                      <p>{{ $user->email }}</p>
                    </div>
                    <label for="Slug"><strong>Slug</strong></label>
                    <div>
                      <p>{{ $user->slug }}</p>
                    </div>
                    <label for="Status"><strong>Online</strong></label>
                    <div>
                      <p>{{ $user->active ? "Yes" : "No" }}</p>
                    </div>
                    <label for="Role"><strong>Role</strong></label>
                    <div>
                        <ul>
                            @forelse ($user->roles as $role)
                              <li>{{$role->display_name}} ({{$role->description}})</li>
                            @empty
                            <p>This user has not been assigned any roles yet</p>
                            @endforelse
                          </ul>
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