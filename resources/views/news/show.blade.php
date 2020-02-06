@extends('layout')

@section('title', 'NewsPage')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/news/show.css')}}?v23">
@endsection

@section('header')
@endsection

@section('menu')
@parent
@endsection

@section('content')
    <div id="news-page">
        <div id="name">{{ $news->name }}</div>
        <div id="news">
            <div id="news-content">
                @for ($i = 0; $i < count($content); $i++)
                    <p>{{ $content[$i] }}</p>
                @endfor
            </div>
            <div id="news-footer">
                <div id="news-footer-user">{{ $user->name }}</div>
                <div id="news-footer-date">{{ $news->date }} {{ $news->time }}</div>
            </div>
            <div id="next-step">
                <div id="previously-content"><a href="/news/{{ $id-1 }}"> <- Прошлая тема</a></div>
                <a id="edit-content" href="{{ route('showEditNews', ['id' => $id]) }}">Редактирование</a>
                <a id="delete-content" href="{{ route('deleteNews', ['id' => $id]) }}">Удаление</a>
                <div id="next-content"><a href="/news/{{ $id+1 }}">Следующая тема -> </a></div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
