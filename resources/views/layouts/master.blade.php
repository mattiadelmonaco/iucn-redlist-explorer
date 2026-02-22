<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/iucn-redlist-explorer-logo.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex flex-col min-h-screen">
    @include('partials.header')

    <main class="flex-1 max-w-7xl w-full mx-auto py-8 px-2 md:px-4 lg:px-8">
        @yield('content')
    </main>

    @include('partials.footer')
</body>

</html>
