<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    @include('partials.header')

    <main class="max-w-300 mx-auto py-8 px-5 min-h-screen">
        @yield('content')
    </main>

    @include('partials.footer')

</body>

</html>
