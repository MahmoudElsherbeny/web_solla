<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!--  styles  -->
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ url('assets/css/font-awesome.css') }}" />
        <link rel="stylesheet" href="{{ url('assets/css/main.css') }}" />        
        <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" />
        
    </head>
    <body>
        <div class="main">

            @yield('content')

        </div>

        <!--  scripts  -->
        <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('assets/js/jquery.min.js') }}"></script>
        <script src="{{ url('assets/js/main.js') }}"></script>
        <script src="{{ url('assets/js/index.js') }}"></script>

        @yield('js_code')

    </body>
</html>