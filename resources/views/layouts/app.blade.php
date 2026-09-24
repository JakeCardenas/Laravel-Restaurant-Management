<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') · Menu Manager</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="topbar">
        <a href="{{ route('menu_items.index') }}">Menu Manager</a>
    </header>

    <main class="container @yield('container_class')">
        @yield('content')
    </main>
</body>
</html>
