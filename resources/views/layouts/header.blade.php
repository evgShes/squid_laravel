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
    <ul id="dropdown1" class="dropdown-content" data-activates="dropdown1">
        <li><a href="#!">Смена пароля</a></li>
        <li><a href="{{ route('logout') }}">Выход</a></li>
    </ul>

    <nav class="header-background" id="site_header">
        <div class="nav-wrapper">
            <a href="{{ url('/') }}" class="brand-logo right">{{ $main_title or '' }}</a>
            <ul id="nav-mobile" class="left">
                <li class="menu_side_nav"><a href=""><i class="material-icons left">reorder</i></a></li>
            </ul>
        </div>
    </nav>
</header>
<div class="container">
    <div class="row">
            <ul id="slide-out" class="side-nav">

                <li><div class="userView">
                        <div class="background header-background">
                            {{--<img src="{{asset('img/head_img.jpg')}}">--}}
                        </div>
                        <a href="" class="buttonshow" data-activates="slide-out"><i class="material-icons left">perm_identity</i></a>
                        <a href=""><span class="white-text name">@if(Auth::check()) {{ Auth::user()->login  }}@endif</span></a>
                        <a href=""><span class="white-text email">@if(Auth::check()) {{ Auth::user()->email  }}@endif</span></a>
                    </div></li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header  waves-effect waves-teal"><i class="material-icons">recent_actors</i>Пользователи</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="{{ route('view','systems.add_users') }}" class="collection-item">Добавить пользователя</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-teal"><i
                                        class="material-icons">settings_applications</i>Логирование</a>
                            <div class="collapsible-body">
                                <ul>
                                    {{--<li><a href="#!" class="collection-item">Поиск</a></li>--}}
                                    <li>
                                        <a href="{{ route('squid.log') }}" class="collection-item">Squid-логи</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('apache.log') }}" class="collection-item">Apache-логи</a>
                                    </li>

                                    <li><a href="{{ route('statistics') }}" class="collection-item">Статистика</a></li>

                                    {{--<li><a href="{{ route('view','systems.add_users') }}" class="collection-item">Добавить пользователя</a></li>--}}
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header waves-effect waves-teal"><i class="material-icons">view_module</i>Панель управления</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="{{ route('site.view') }}" class="collection-item">Настройки</a></li>
                                    <li><a href="{{ route('control_panel.report') }}" class="collection-item">Отчеты</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
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