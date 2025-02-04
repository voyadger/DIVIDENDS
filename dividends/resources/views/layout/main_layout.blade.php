
<?php

$user = \Illuminate\Support\Facades\Auth::user();
$auth = \Illuminate\Support\Facades\Auth::check();

?>




<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    @yield('head')

    @yield('page_info')

    <link rel="stylesheet" type="text/css" href="{{ URL::to('dividends/resources/css/layout/main_layout.css') }}">
</head>
<body>

<div class="supreme-container">

    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark main-header">
            <div class="container-fluid">
                <a class="navbar-brand" href="/dividends/home">FinDesck</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= (isset($pageInfo) and $pageInfo['name'] == 'home') ? 'active' : '' ?>"
                               href="/dividends/home">Главная</a>
                        </li>
                        @if($auth)
                            <li class="nav-item">
                                <a class="nav-link <?= (isset($pageInfo) and $pageInfo['name'] == 'stock') ? 'active' : '' ?>"
                                   href="/dividends/stock">Акции</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= (isset($pageInfo) and $pageInfo['name'] == 'portfolio') ? 'active' : '' ?>"
                                   href="/dividends/portfolio">Портфель</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= (isset($pageInfo) and $pageInfo['name'] == 'calendar') ? 'active' : '' ?>"
                                   href="/dividends/calendar">Календарь дивидендов</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link <?= (isset($pageInfo) and $pageInfo['name'] == 'pricing') ? 'active' : '' ?>"
                               href="/dividends/pricing">Цены</a>
                        </li>
                    </ul>

                    @if($auth)
                    <button type="button" class="btn position-relative btn-notification">
                        Уведомления
                        <span class="position-absolute top-10 start-10 translate-middle badge rounded-pill bg-danger">
                            99+
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </button>
                    @endif

                    <span class="space-block"></span>

                    <span class="navbar-text">

                        @if($auth)
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $user ? $user->name : 'не вошли' ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item" href="/dividends/account">Аккаунт</a></li>
                                <li><a class="dropdown-item" href="#">Уведомления</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/dividends/logout">Выход</a></li>
                            </ul>
                        </div>
                        @else
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="/dividends/login">Войти</a>
                                </li>
                            </ul>
                        @endif
                    </span>
                </div>
            </div>
        </nav>
    </header>



    @yield('body')



</div>


<div class="modal fade" tabindex="-1" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>



<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
