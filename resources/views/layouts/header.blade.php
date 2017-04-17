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
<body>

<header>
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#!">Смена пароля</a></li>
        <li><a href="{{ route('logout') }}">Выход</a></li>
    </ul>
    <nav class="indigo darken-3">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">Система распределения сетевыми ресурасами
                ЕРЦ ЛНР</a>
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
                            <a href="{{ route('view','systems.add_users') }}" class="collection-item">Добавить пользователя</a>
                            <a href="{{ route('squid.view') }}" class="collection-item">Пользователи</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">settings_applications</i>Система</div>
                    <div class="collapsible-body">
                        <div class="collection">
                            <a href="#!" class="collection-item">Поиск</a>
                            <a href="{{ route('view','systems.add_users') }}" class="collection-item">Добавить пользователя</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">view_module</i>Панель управления</div>
                    <div class="collapsible-body">
                        <div class="collection">
                            <a href="#!" class="collection-item">Статистика</a>
                            <a href="{{ route('site.view') }}" class="collection-item">Настройки</a>
                            <a href="{{ route('view','control_panel.report') }}" class="collection-item">Отчеты</a>

                        </div>
                    </div>
                </li>
            </ul>

            {{--<ul id="nav-mobile" class="side-nav fixed" style="transform: translateX(0%);">--}}

                {{--<li><div class="userView">--}}
                        {{--<div class="background">--}}
                            {{--<img src="{{asset('img/head_img.jpg')}}">--}}
                        {{--</div>--}}
                        {{--<a href=""><i class="material-icons left">perm_identity</i></a>--}}
                        {{--<a href=""><span class="white-text name">@if(Auth::check()) {{ Auth::user()->login  }}@endif</span></a>--}}
                        {{--<a href=""><span class="white-text email">@if(Auth::check()) {{ Auth::user()->email  }}@endif</span></a>--}}
                    {{--</div></li>--}}
                {{--<li class="no-padding">--}}
                    {{--<ul class="collapsible collapsible-accordion">--}}
                        {{--<li class="bold"><a class="collapsible-header  waves-effect waves-teal"><i class="material-icons">recent_actors</i>Пользователи</a>--}}
                            {{--<div class="collapsible-body">--}}
                                {{--<ul>--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ route('view','systems.add_users') }}" class="collection-item">Добавить пользователя</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ route('view','users.users') }}" class="collection-item">Пользователи</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="bold"><a class="collapsible-header  waves-effect waves-teal"><i class="material-icons">settings_applications</i>Система</a>--}}
                            {{--<div class="collapsible-body">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="#!" class="collection-item">Поиск</a></li>--}}
                                    {{--<li><a href="{{ route('view','systems.add_users') }}" class="collection-item">Добавить пользователя</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="bold"><a class="collapsible-header waves-effect waves-teal"><i class="material-icons">view_module</i>Панель управления</a>--}}
                            {{--<div class="collapsible-body" style="">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="#!" class="collection-item">Статистика</a></li>--}}
                                    {{--<li><a href="{{ route('site.view') }}" class="collection-item">Настройки</a></li>--}}
                                    {{--<li><a href="{{ route('view','control_panel.report') }}" class="collection-item">Отчеты</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}

            <!--<ul id="slide-out" class="side-nav fixed">-->
            <!--<li><div class="userView">-->
            <!--<div class="background">-->
            <!--<img src="images/office.jpg">-->
            <!--</div>-->
            <!--<a href="#!user"><img class="circle" src="images/yuna.jpg"></a>-->
            <!--<a href="#!name"><span class="white-text name">John Doe</span></a>-->
            <!--<a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>-->
            <!--</div></li>-->
            <!--<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>-->
            <!--<li><a href="#!">Second Link</a></li>-->
            <!--<li><div class="divider"></div></li>-->
            <!--<li><a class="subheader">Subheader</a></li>-->
            <!--<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>-->
            <!--</ul>-->
        </div>
        <div class="col s10" style="margin-top:20px;">
            {{--            {{ dd(get_defined_vars()) }}--}}
            <h4 class="truncate center-align">{{ $view_title or '' }}</h4>