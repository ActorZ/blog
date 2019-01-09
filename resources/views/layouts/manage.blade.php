<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Managment</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/buefy/dist/buefy.min.css">
</head>
<body>

  @include('_includes.nav.main')
  @include('_includes.nav.manage')

    <div class="management-area" id="app">
        
        @yield('content')

    </div>
<!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/vue@2.4.2"></script>
    <script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>
        @yield('scripts')
</body>
</html>
