@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s8 offset-s2">
            <h3 class="header">Регистрация</h3>
            <div class="card horizontal" style="border-radius: 10px;">
                <div class="card-image">
                    {{--<img src="http://lorempixel.com/100/190/nature/6">--}}
                </div>
                <div class="card-stacked">
                    <form role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="card-content">
                            {{--<div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">--}}
                            {{--<label for="login" class="col-md-4 control-label">login</label>--}}
                            <div class="row">
                                <div class="col m12 input-field">
                                    <input id="login" type="text" name="login" value="{{ old('login') }}" required
                                           autofocus>
                                    @if ($errors->has('login'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('login') }}</strong>
                                        </span>
                                    @endif
                                    <label for="login">Логин:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m12 input-field">
                                    <input id="fio" type="text" name="fio" value="{{ old('fio') }}"
                                           required>
                                    @if ($errors->has('fio'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fio') }}</strong>
                                        </span>
                                    @endif
                                    <label for="fio">Фамилия Имя Отчество:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m12 input-field">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}"
                                           required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    <label for="email">E-mail:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m12 input-field">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    <label for="password">Пароль:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m12 input-field">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                    <label for="password-confirm">Повторите пароль:</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col m6">
                                    <a class="btn waves-effect waves-light orange darken-3 " href="{{ route('login') }}"
                                       type="submit" name="action">Авторизироваться
                                    </a>
                                </div>
                                <div class="col m6 ">
                                    <button class="btn waves-effect waves-light teal darken-3" type="submit">
                                        Зарегистрироваться
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        {{--<div class="col-md-8 col-md-offset-2">--}}
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading">Register</div>--}}
        {{--<div class="panel-body">--}}
        {{--<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">--}}
        {{--{{ csrf_field() }}--}}

        {{--<div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">--}}
        {{--<label for="login" class="col-md-4 control-label">login</label>--}}

        {{--<div class="col-md-6">--}}
        {{--<input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" required autofocus>--}}

        {{--@if ($errors->has('login'))--}}
        {{--<span class="help-block">--}}
        {{--<strong>{{ $errors->first('login') }}</strong>--}}
        {{--</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group{{ $errors->has('fio') ? ' has-error' : '' }}">--}}
        {{--<label for="fio" class="col-md-4 control-label">fio</label>--}}

        {{--<div class="col-md-6">--}}
        {{--<input id="fio" type="text" class="form-control" name="fio" value="{{ old('fio') }}"--}}
        {{--required autofocus>--}}

        {{--@if ($errors->has('fio'))--}}
        {{--<span class="help-block">--}}
        {{--<strong>{{ $errors->first('fio') }}</strong>--}}
        {{--</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
        {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

        {{--<div class="col-md-6">--}}
        {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>--}}

        {{--@if ($errors->has('email'))--}}
        {{--<span class="help-block">--}}
        {{--<strong>{{ $errors->first('email') }}</strong>--}}
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
        {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

        {{--<div class="col-md-6">--}}
        {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
        {{--<div class="col-md-6 col-md-offset-4">--}}
        {{--<button type="submit" class="btn btn-primary">--}}
        {{--Register--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</form>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>
</div>
@endsection
