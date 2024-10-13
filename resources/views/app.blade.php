<!DOCTYPE html>

<html lang="{{ App::currentLocale() }}">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ config( 'app.name' ) }}</title>

    {{-- @vite( [ 'resources/css/front.css', 'resources/js/front.js' ] ) --}}
    <link rel="stylesheet" href="{{ mix('css/front.css') }}">
    <script src="{{ mix('js/front.js') }}" defer></script>

    @inertiaHead

</head>

<body>
    @include('layouts.navbar')


    @inertia
    @include('layouts.footer2')
</body>

</html>
