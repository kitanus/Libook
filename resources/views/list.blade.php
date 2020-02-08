@extends('layout')

@section('title', 'ListPage')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/list.css')}}?v5">
@endsection

@section('header')
@endsection

@section('menu')
    @parent
@endsection

@section('content')
    <div id="list-block">
        <div id="name">Список</div>
        <div id="letters">
            @foreach($words as $word)
                <a href="{{ route('filterWord', ['word'=>$word]) }}">{{ mb_strtoupper($word) }}</a>
            @endforeach
        </div>
        <div id="main-list">
            @foreach($books as $book)
                <a class="book" href="/">
                    <span class="author">{{ $book->getAuthor()->name }} {{ $book->getAuthor()->surname }}</span>
                    <span class="name">{{ $book->name }}</span>
                    <span class="year">{{ $book->year }}</span>
                </a>
            @endforeach
        </div>
        <div id="pages">
            <a class="pages">пред.</a>
            @for($i = 1; $i < $pages+1; $i++)
                <a class="page" href="{{ route('pageList', ['page' => $i]) }}">{{ $i }}</a>
            @endfor
            <a class="pages">след.</a>
        </div>
    </div>
    <div id="list-sidebar">
        <div id="name">Фильтр</div>
        <div id="filter">
            <form action="/" method="post" id="list-form">
                <label for="select_genre">Жанр: </label>
                <select name="genre" id="select_genre">
                    <option value="detective">Детектив</option>
                    <option value="romance">Романтика</option>
                    <option value="comedy">Комедия</option>
                    <option value="drama">Драма</option>
                    <option value="doc">Документалистика</option>
                    <option value="adventure">Приключение</option>
                </select>
                <label for="select_country">Страна писателя: </label>
                <select name="country" id="select_country">
                    <option value="japan">Япония</option>
                    <option value="russia">Россия</option>
                    <option value="america">Америка</option>
                    <option value="britain">Британия</option>
                </select>
            </form>
        </div>
        <button name="action" value="filter" form="list-form">Найти</button>
    </div>
@endsection

@section('footer')
    @parent
@endsection
