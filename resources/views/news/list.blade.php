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
            @foreach ($news as $article)
                <div class="news-row">
                    <span class="time-news">{{ $article->time }}</span> <a href="/news/{{ $article->id }}">{{ $article->name }}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
