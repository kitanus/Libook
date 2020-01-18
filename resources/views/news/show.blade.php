@extends('layout')

@section('title', 'NewsPage')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/news/show.css')}}?v1">
@endsection

@section('header')
@endsection

@section('menu')
@parent
@endsection

@section('content')
    <div id="news-page">
        <div id="name">{{ $name }}</div>
        <div id="news">
            <div id="news-content">
                @for ($i = 0; $i < count($content); $i++)
                    <p>{{ $content[$i] }}</p>
                @endfor
            </div>
            <div id="news-footer">
                <div id="news-footer-user">Vladislav Kochev</div>
                <div id="news-footer-date">09.04.2019</div>
            </div>
            <div id="next-step">
                <div id="previously-content"><a href="/news?news_id={{ $id-1 }}"> <- Прошлая тема</a></div>
                <div id="next-content"><a href="/news?news_id={{ $id+1 }}">Следующая тема -> </a></div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
