@extends('layout')

@section('title', 'MainPage')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}?v1">
@endsection

@section('header')
    @parent
@endsection

@section('menu')
    @parent
@endsection

@section('user')

    @if($user === false)
        <a id="enter" href="{{ route('login') }}">Вход</a>
        <a id="login" href="{{ route('register') }}">Регистрация</a>
    @else
        <a id="enter">{{ $user }}</a>
        <a id="logout" href="{{ route('logmin') }}">Выход</a>
    @endif

@endsection

@section('content')
    <div id="news-block">
        <div id="name">Новостной блок</div>
        <div id="blockNews">
            <div id="first-news-name">{{ $lastNews['preLast']["name"] }}</div>
            <div id="first-news">
                @for ($i = 0; $i < count($textNews[0]); $i++)
                    <p>{{ $textNews[0][$i] }}</p>
                @endfor
            </div>
            <a id="first-news-end" href="/">Читать дальше...</a>

            <div id="second-news-name">{{ $lastNews['last']["name"] }}</div>
            <div id="second-news">
                @for ($i = 0; $i < count($textNews[1]); $i++)
                    <p>{{ $textNews[1][$i] }}</p>
                @endfor
            </div>
            <a id="second-news-end" href="/">Читать дальше...</a>
        </div>
    </div>
    <div id="sidebar">
        <div id="name">Последние добавленные книги</div>
        <div id="blockList">
            <ul id="list">
                <li><a href="/">Пункт 1</a></li>
                <li><a href="/">Пункт 1</a></li>
                <li><a href="/">Пункт 1</a></li>
            </ul>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
