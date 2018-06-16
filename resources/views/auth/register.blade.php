@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">
                            {{ __('Register') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="panel-body">       
                          <div class="col-md-8 col-md-offset-1 col-xm-12 text-center">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group text-center">
                                <div class="col-md-8 col-md-offset-1 col-xm-12">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                                </div>
                        </div>

                        <div class="form-group text-center">
                                <div class="col-md-8 col-md-offset-1 col-xm-12">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                                </div>
                        </div>

                        <div class="form-group text-center">
                                <div class="col-md-8 col-md-offset-1 col-xm-12">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                                </div>
                        </div>

                        <div class="form-group text-center">
                                <div class="col-md-8 col-md-offset-1 col-xm-12">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                                </div>
                        </div>

                        <div class="form-group text-center">
                                <div class="col-md-8 col-md-offset-1 col-xm-12">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
    
                                <div class="col-md-6">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="1">Male</option>
                                        <option value="0">Female</option>
                                    </select>
    
                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
