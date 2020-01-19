<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AdminPage</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}?v1">
</head>
<body>
<div id="title">
    <h1>Админка</h1>
</div>

<div id="title-create-news">
    <h2>Создание новости</h2>
</div>

<div id="create-news">
    <form method="post" action="<?= route('createNews')  ?>">
        {{ csrf_field() }}
        <label for="title-news">
            <p>Название новости:</p>
            <input name="name" id="title-news" type="text">
        </label>
        <label for="text-news">
            <p>Текст новости:</p>
            <textarea name="text" id="text-news"></textarea>
        </label>
        <label for="author-news">
            <p>Автор:</p>
            <select name="author" id="author-news">
                <option value="A">Абракан</option>
                <option value="B">Воинство</option>
                <option value="C">Судейство</option>
            </select>
        </label>
        <button name="action" value="send">Выложить новость</button>
    </form>
</div>

</body>
</html>
