<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Главная</title>
  <link href="/css/normalize.min.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
</head>
<body>
    <header class="main-header">
        @include('layout.header')
    </header>

    @if (!Request::is('/'))
        @include('layout.nav')
    @endif

    <main class="container">
        @yield('content')
    </main>

    <footer class="main-footer">
        @include('layout.footer')
    </footer>
</body>
</html>