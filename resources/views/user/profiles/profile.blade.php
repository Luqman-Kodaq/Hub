@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
                {{ $user->name }} Profile
            <small>Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('user.index') }}">User</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="row">
        <div class="col-md-3 col-md-offset-4 col-xs-12">
            <div class="thumbnail" style="border-radius: 5%">
              <img src="{{ Storage::url(Auth::user()->profile_photo) }}" alt="{{ Auth::user()->name }}" style="border-radius: 5%">
              <span class="hidden-xs"></span>
              <div class="caption form-group text-center">
                <h3><strong>{{ Auth::user()->name }}</strong></h3>
                <p>{{ Auth::user()->profile->about }}</p>
                <label for="facebook"><strong>Facebook Id:</strong></label>
                    <p>{{ $user->profile->facebook }}</p>
                <label for="twitter"><strong>Twitter Id:</strong></label>
                    <p>{{ $user->profile->twitter }}</p>
                <label for="instagram"><strong>Instagram Id:</strong></label>
                    <p>{{ $user->profile->instagram }}</p>
              </div>
              <div>
                <p>
                    @if(Auth::id() == $user->id)
                        <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-info" style="border-radius: 50px">Edit profile</a>
                      @endif
               <a href="{{ route('home') }}" class="btn btn-sm btn-info pull-right" role="button" style="border-radius: 50px"> <i class="fa fa-"></i> Cancel</a>
              </p>
              </div>
        </div>
        </div>
    </div>
        <!-- /.row -->
    </section>
@endsection