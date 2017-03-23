<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!--<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

    <link href="{{ asset('materialize/css/materialize.min.css') }}" rel="stylesheet">
    <link href="{{ asset('materialize/fonts/icon.css') }}" rel="stylesheet">
    <link href="{{ asset('query/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">



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
                <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">perm_identity</i>{{ Auth::user()->login }}<i class="material-icons right">arrow_drop_down</i></a></li>
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

                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">settings_applications</i>Система</div>
                    <div class="collapsible-body">
                        <div class="collection">
                            <a href="#!" class="collection-item">Поиск</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">view_module</i>Панель управления</div>
                    <div class="collapsible-body">
                        <div class="collection">
                            <a href="#!" class="collection-item">Статистика</a>
                            <a href="{{ url('control_panel.settings') }}" class="collection-item">Настройки</a>
                            <a href="{{ url('control_panel.report') }}" class="collection-item">Отчеты</a>

                        </div>
                    </div>
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
            <h4 class="truncate center-align">Отчет</h4>