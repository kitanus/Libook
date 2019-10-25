<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        @yield('styles')
    </head>
    <body>
        @section('header')
        <header>'
            <div id="logo">Logo</div>
            <div id="name">Libook</div>
            <div id="user">
                <a id="enter">Вход</a>
                <a id="login">Регистрация</a>
            </div>
        </header>
        @show

        @section('menu')
        <div id="menu">
            <a id="a-main" href="/">Главная</a>
            <a id="a-news-page" href="<?= route('news') ?>">Новости</a>
            <a id="a-list" href="<?= route('list') ?>">Список</a>
            <a id="a-search" href="/">Расширенный поиск</a>
            <form action="">
                    <input type="text" placeholder="Поиск">
                    <button name="action">Найти</button>
            </form>
            </div>
        </div>
        @show

        @yield('content')

        @section('footer')
        <footer>FOOTER</footer>
        @show
    </body>
</html>
