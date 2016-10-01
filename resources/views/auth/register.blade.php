@extends('layouts.app')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register')}}" enctype="multipart/form-data" files="true">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('nick_name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label required">Nick Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nick_name" value="{{old('first_name')}}">

                                @if ($errors->has('nick_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nick_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label required">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label required">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label required">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend><small>More Info:</small></legend>

                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label required">First Name</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}">

                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('middle_initial') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label required">Middle Initial</label>

                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="middle_initial" value="{{old('middle_initial')}}">

                                        @if ($errors->has('middle_initial'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('middle_initial') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label required">Last Name</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Profile Picture</label>

                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="photo" value="" >

                                        @if ($errors->has('photo'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            </fieldset>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
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
