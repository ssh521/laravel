<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>라라벨 - @yield('title')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">홈</a></li>
            </ul>
        </nav>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @if (session()->has('status'))
            <div>{{ session()->get('status') }}</div>
        @endif

        <main>@yield('content')</main>
        
    </body>
</html>
