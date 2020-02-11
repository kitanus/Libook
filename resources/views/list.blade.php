@extends('layout')

@section('title', 'ListPage')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/list.css')}}?v6">
@endsection

@section('header')
@endsection

@section('menu')
    @parent
@endsection

@section('content')
    <div id="list-block">
        <div id="name">Список</div>
        <div id="kind">
            <a href="{{ $kindType['name'] }}">Название произведения</a>
            <a href="{{ $kindType['name-author'] }}">Имя автора</a>
            <a href="{{ $kindType['surname-author'] }}">Фамилия автора</a>
        </div>
        <div id="letters">
            <a href="{{ route('pageList', ['page'=>1]) }}">Все</a>
            @foreach($words as $word)
                @if(isset($kind))
                    <a href="{{ route('filterWord', ['kind' => $kind, 'word'=>$word, 'page'=>1]) }}">{{ mb_strtoupper($word) }}</a>
                @else
                    <a href="{{ route('filterWord', ['kind' => "name", 'word'=>$word, 'page'=>1]) }}">{{ mb_strtoupper($word) }}</a>
                @endif
            @endforeach
        </div>
        <div id="main-list">
            @foreach($books as $book)
                <a class="book" href="/">
                    <span class="author">{{ $book->author->name }} {{ $book->author->surname }}</span>
                    <span class="name">{{ $book->name }}</span>
                    <span class="year">{{ $book->year }}</span>
                </a>
            @endforeach
        </div>
        <div id="pages">
            <a class="pages">пред.</a>
            @for($i = 1; $i < $countPages+1; $i++)
                @if(isset($wordPage))
                    <a class="page @if($i == $page) current @endif" href="{{ route('filterWord', ['kind' => $kind, 'word' => $wordPage, 'page' => $i]) }}">{{ $i }}</a>
                @else
                    <a class="page @if($i == $page) current @endif" href="{{ route('pageList', ['page' => $i]) }}">{{ $i }}</a>
                @endif
            @endfor
            <a class="pages">след.</a>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
