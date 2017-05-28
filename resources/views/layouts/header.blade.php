<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $view_title or '' }}</title>
    <!--<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

    <link href="{{ asset('materialize/css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('materialize/fonts/icon.css') }}" rel="stylesheet">
    <link href="{{ asset('query/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/squid.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body style="background: rgb(249, 250, 255)">

<header>
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#!">Смена пароля</a></li>
        <li><a href="{{ route('logout') }}">Выход</a></li>
    </ul>
    <nav style="background-image: url({{ asset('img/Network.jpg') }}); background-position: right bottom; background-size: 100%" class="indigo darken-3">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">Система управления распределением сетевых ресурсов
                ЕРЦP</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">perm_identity</i>@if(Auth::check()) {{ Auth::user()->login  }}@endif<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>
</header>
<div class="parallax-container">
    <div class="row">
        <div class="col s2">
            <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><i class="material-icons">recent_actors</i>Пользователи</div>
                    <div class="collapsible-body">
                        <div class="collection">
                            <a href="{{ route('add_users') }}" class="collection-item">Добавить сотрудника</a>
                            <a href="{{ route('users.list_users') }}" class="collection-item">Список сотрудников</a>
                            <a href="{{ route('users.users_quota') }}" class="collection-item">Добавление квоты сотрудникам</a>
                            <a href="{{ route('squid.view') }}" class="collection-item">Squid-журнал</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">settings_applications</i>Система</div>
                    <div class="collapsible-body">
                        <div class="collection">
                            <a href="{{ route('statistics') }}" class="collection-item">Статистика</a>
                            <a href="{{ route('control_panel.report') }}" class="collection-item">Отчеты</a>
                            <a href="{{ url('v/systems.journal') }}" class="collection-item">Журнал отчетов</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">view_module</i>Панель управления</div>
                    <div class="collapsible-body">
                        <div class="collection">
                            {{--<a href="{{ url('views/control_panel/statistics') }}" class="collection-item">Статистика</a>--}}

                            <a href="{{ route('site.view') }}" class="collection-item">Настройки</a>


                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col s10" style="margin-top:20px;">
            {{--            {{ dd(get_defined_vars()) }}--}}
            <h4 class="truncate center-align">{{ $view_title or '' }}</h4>