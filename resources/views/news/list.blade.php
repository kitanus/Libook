@extends('layout')

@section('title', 'NewsPage')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/news/list.css')}}?v3">
@endsection

@section('header')
@endsection

@section('menu')
@parent
@endsection

@section('content')
    <div id="news-page">
        <h2 id="title">Новости</h2>
        <div id="news-list">
            <div class="news-row">
                <span class="time-news">14:39</span> <a href="/news/1">Бывший глава спецслужб Армении найден мертвым с огнестрельным ранением</a>
            </div>
            <div class="news-row">
                <span class="time-news">14:39</span> <a href="/">Бывший глава спецслужб Армении найден мертвым с огнестрельным ранением</a>
            </div>
            <div class="news-row">
                <span class="time-news">14:39</span> <a href="/">Бывший глава спецслужб Армении найден мертвым с огнестрельным ранением</a>
            </div>
            <div class="news-row">
                <span class="time-news">14:39</span> <a href="/">Бывший глава спецслужб Армении найден мертвым с огнестрельным ранением</a>
            </div>
            <div class="news-row">
                <span class="time-news">14:39</span> <a href="/">Бывший глава спецслужб Армении найден мертвым с огнестрельным ранением</a>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
