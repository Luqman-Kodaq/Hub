@extends('layouts.app')

@section('content')
<div class="container" id="registerContainer">
    <div class="row justify-content-center">
            <div class="col-md-12 col-md-offset-2 col-xs-12">
            <div class="card" id="registerCard">
                <div class="loginText">{{ __('REGISTER') }}</div>
                <hr>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                            <div class="form-group" id="inputRegisterName">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            <label id="inputRegisterNameLabel" for="name">Name</label>
                            <div id="inputRegisterProgress"></div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                        </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                            <div id="inputRegisterEmail" class="form-group">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            <label id="inputRegisterEmailLabel" for="email">E-Mail Address</label>
                            <div id="inputRegisterProgressEmail"></div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                        </div>

                        <div class="form-group row" id="genderDiv">
                                <select name="gender" id="gender" class="form-control select">
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                                <div id="inputRegisterProgressGender"></div>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                                <div id="inputRegisterPassword" class="form-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <label id="inputRegisterPasswordLabel" for="password">Password</label>
                                    <div id="inputRegisterProgressPassword"></div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 col-xm-12">
                             <div id="inputRegisterConfirm" class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>                                
                            <label id="inputRegisterConfirmLabel" for="password-confirm">Confirm Password</label>
                            <div id="inputRegisterProgressConfirm"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 col-xm-12">
                               <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-block">
                                    {{ __('REGISTER') }}
                                </button>
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