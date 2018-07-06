@extends('layouts.app')

@section('content')
<div class="container" id="loginContainer">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-2 col-xs-12">
            <div class="card" id="loginCard">
                <div class="loginText">{{ __('LOG IN') }}</div>
                <hr>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                        <div class="col-md-12 col-xm-12">
                          <div id="input-group" class="form-group">
                                <input id="email" type="email" class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            <label id="input-label" for="email">Enter Email</label>
                                <div id="input-progress"></div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                         </div>
                        </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                            <div id="input-proceed" class="form-group">
                                <input id="password" type="password" class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <label id="input-label" for="password">Password</label>
                                <div id="input-progressing"></div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>
                        </div>

                        <div class="form-group row">
                                <div class="col-md-6 col-xm-12">
                                <div class="checkbox">
                                    <div class="form-group">
                                    <label>
                                        <input type="checkbox" class="remember ml-2" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                                <div class="col-md-12 col-xm-12">
                                    <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg" id="btn">
                                    {{ __('LOG IN') }}
                                </button>

                                <a class="btn btn-link text-muted" id="checkbox" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection