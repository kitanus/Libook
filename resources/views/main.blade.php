<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}?v1">
    </head>
    <body>
        <header>'
            <div id="logo">Logo</div>
            <div id="name">Libook</div>
            <div id="user">
                <div id="enter">Enter</div>
                <div id="login">Login</div>
            </div>
        </header>
        <div id="menu">
            <div id="a-main">a-main</div>
            <div id="a-list">a-list</div>
            <div id="a-search">a-search</div>
            <form action="">
                    <input type="text" value="text">
                    <button name="action">button</button>
            </form>
            </div>
        </div>
        <main>
            <div id="news-block">
                <div id="name">newsName</div>
                <div id="blockNews">
                    <div class="content">blockNews</div>
                    <div class="content">blockNews</div>
                </div>
            </div>
            <div id="sidebar">
                <div id="name">sb name</div>
                <div id="blockList">
                    <div id="list">List</div>
                </div>
            </div>
        </main>
        <footer></footer>
    </body>
</html>
