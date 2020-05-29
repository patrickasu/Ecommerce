<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="/css/style.css" rel="stylesheet"> 
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    

        {{-- display success message --}}
        @if(session()->has('message'))
            <div class="alert alert-success text-center" role="alert">
               {{session('message')}}
            </div>
        @endif

        {{-- display error message --}}
        @if(session()->has('error'))
        <div class="alert alert-danger text-center" role="alert">
            {{session('error')}}
        </div>
        @endif
        
        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
