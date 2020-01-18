@extends('layout')

@section('title', 'ListPage')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/list.css')}}?v3">
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
            <a href="<?= route('list') ?>?fLetter=A">А</a>
            <a href="<?= route('list') ?>?fLetter=Б">Б</a>
            <a href="<?= route('list') ?>?fLetter=В">В</a>
            <a href="<?= route('list') ?>?fLetter=Г">Г</a>
            <a href="<?= route('list') ?>?fLetter=Д">Д</a>
            <a href="<?= route('list') ?>?fLetter=Е">Е</a>
            <a href="<?= route('list') ?>?fLetter=Ж">Ж</a>
            <a href="<?= route('list') ?>?fLetter=З">З</a>
            <a href="<?= route('list') ?>?fLetter=И">И</a>
            <a href="<?= route('list') ?>?fLetter=Й">Й</a>
            <a href="<?= route('list') ?>?fLetter=К">К</a>
            <a href="<?= route('list') ?>?fLetter=Л">Л</a>
            <a href="<?= route('list') ?>?fLetter=М">М</a>
            <a href="<?= route('list') ?>?fLetter=Н">Н</a>
            <a href="<?= route('list') ?>?fLetter=О">О</a>
            <a href="<?= route('list') ?>?fLetter=Л">П</a>
            <a href="<?= route('list') ?>?fLetter=Р">Р</a>
            <a href="<?= route('list') ?>?fLetter=С">С</a>
            <a href="<?= route('list') ?>?fLetter=Т">Т</a>
            <a href="<?= route('list') ?>?fLetter=У">У</a>
            <a href="<?= route('list') ?>?fLetter=Ф">Ф</a>
            <a href="<?= route('list') ?>?fLetter=Х">Х</a>
            <a href="<?= route('list') ?>?fLetter=Ц">Ц</a>
            <a href="<?= route('list') ?>?fLetter=Ч">Ч</a>
            <a href="<?= route('list') ?>?fLetter=Ш">Ш</a>
            <a href="<?= route('list') ?>?fLetter=Щ">Щ</a>
            <a href="<?= route('list') ?>?fLetter=Э">Э</a>
            <a href="<?= route('list') ?>?fLetter=Ю">Ю</a>
            <a href="<?= route('list') ?>?fLetter=Я">Я</a>
            <a href="<?= route('list') ?>?fLetter=numb">Цифра</a>
        </div>
        <div id="main-list">
            <a class="book" href="/">
                <span class="author">Автор1</span>
                <span class="name">Название1</span>
                <span class="year">11.06.2017</span>
            </a>
            <a class="book">
                <span class="author">Автор1</span>
                <span class="name">Название1</span>
                <span class="year">11.06.2017</span>
            </a>
            <a class="book">
                <span class="author">Автор1</span>
                <span class="name">Название1</span>
                <span class="year">11.06.2017</span>
            </a>
            <a class="book">
                <span class="author">Автор1</span>
                <span class="name">Название1</span>
                <span class="year">11.06.2017</span>
            </a>
            <a class="book">
                <span class="author">Автор1</span>
                <span class="name">Название1</span>
                <span class="year">11.06.2017</span>
            </a>
            <a class="book">
                <span class="author">Автор1</span>
                <span class="name">Название1</span>
                <span class="year">11.06.2017</span>
            </a>
            <a class="book">
                <span class="author">Автор1</span>
                <span class="name">Название1</span>
                <span class="year">11.06.2017</span>
            </a>
            <a class="book">
                <span class="author">Автор1</span>
                <span class="name">Название1</span>
                <span class="year">11.06.2017</span>
            </a>
            <a class="book">
                <span class="author">Автор1</span>
                <span class="name">Название1</span>
                <span class="year">11.06.2017</span>
            </a>
            <a class="book">
                <span class="author">Автор1</span>
                <span class="name">Название1</span>
                <span class="year">11.06.2017</span>
            </a>
        </div>
        <div id="pages">
            <a class="pages">пред.</a>
            <a class="page">1</a>
            <a class="page">2</a>
            <a class="page">3</a>
            <a class="page">4</a>
            <a class="page">5</a>
            <a class="page">1</a>
            <a class="page">2</a>
            <a class="page">3</a>
            <a class="page">4</a>
            <a class="page">5</a>
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
