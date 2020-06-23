<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Name</title>
    <link rel="stylesheet" href="block.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<header>
    <a href="/" class="logo"><img src="logo.png" alt=""></a>
    <ul>
        <li>
            <a href="/">Головна</a>
        </li>
        <li>
            <a href="/contacts">Контакти</a>
        </li>
        <li>
            <a href="/rules">Правила сайту</a>
        </li>
    </ul>
</header>
<main>
    @yield('content')
</main>
<footer></footer>
<script src="main.js"></script>
</body>
</html>
