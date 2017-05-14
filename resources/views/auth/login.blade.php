@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s8 offset-s2">
                <h2 class="header">Авторизация</h2>
                <div class="card horizontal">
                    <div class="card-image">
                        {{--<img src="{{ asset('img/luxfon.jpg') }}">--}}
                    </div>
                    <div class="card-stacked">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="card-content">
                                <div class="row">

                                    <div class="col m12 input-field">
                                        <input id="login" type="text" name="login" value="{{ old('login') }}" required
                                               autofocus>
                                        <label for="login">Логин:</label>
                                    </div>
                                    @if ($errors->has('login'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col m12 input-field">
                                        <input id="password" type="password" class="form-control" name="password"
                                               required>
                                        <label for="password">Пароль:</label>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col m6">
                                        <a class="btn waves-effect waves-light orange darken-3 "
                                           href="{{ route('register') }}" type="submit" name="action">Зарегистрироваться
                                        </a>
                                    </div>
                                    <div class="col m3 offset-m3">
                                        <button class="btn waves-effect waves-light teal darken-3" type="submit"
                                                name="action">Войти
                                            <i class="material-icons right">send</i>
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
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-8 col-md-offset-2">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">Login</div>--}}
    {{--<div class="panel-body">--}}
    {{--<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">--}}
    {{--{{ csrf_field() }}--}}

    {{--<div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">--}}
    {{--<label for="login" class="col-md-4 control-label">Login</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="login" type="login" class="form-control" name="login" value="{{ old('login') }}" required autofocus>--}}

    {{--@if ($errors->has('login'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('login') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
    {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="password" type="password" class="form-control" name="password" required>--}}

    {{--@if ($errors->has('password'))--}}
    {{--<span class="help-block">--}}
    {{--<strong>{{ $errors->first('password') }}</strong>--}}
    {{--</span>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
    {{--<div class="col-md-6 col-md-offset-4">--}}
    {{--<div class="checkbox">--}}
    {{--<label>--}}
    {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
    {{--</label>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
    {{--<div class="col-md-8 col-md-offset-4">--}}
    {{--<button type="submit" class="btn btn-primary">--}}
    {{--Login--}}
    {{--</button>--}}

    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
    {{--Forgot Your Password?--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection
