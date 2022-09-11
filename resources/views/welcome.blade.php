{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Essential Oils</title>
    </head>
    <body class="antialiased"> --}}
        @extends('layouts.welcome')
        @section('content')
             <img src="{{ asset('/img/welcome.jpg') }}" alt="">

        @endsection
        {{--     </body>
</html>
 --}}