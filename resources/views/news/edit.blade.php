@extends('layout')

@section('title', 'NewsPage')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/news/edit.css')}}?v1">
@endsection

@section('header')
@endsection

@section('menu')
@parent
@endsection

@section('content')
    <div id="news-page">
        <form method="post" action="{{ route('editNews', ['id' => $id])  }}">
            {{ csrf_field() }}
            <label for="title-news">
                <p>Название новости:</p>
                <input name="name" id="title-news" type="text" value="{{ $news->name }}">
            </label>
            <label for="text-news">
                <p>Текст новости:</p>
                <textarea name="text" id="text-news">@for ($i = 0; $i < count($content); $i++){{ $content[$i] }}@endfor</textarea>
            </label>
            <button name="action" value="send">Редактировать новость</button>
        </form>
    </div>
@endsection

@section('footer')
    @parent
@endsection
