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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .brMoney::before {
            content:"R$";
        }
    </style>
</head>
<body>
    <div id='app'>
        <v-app>
            @include('inc.navbar')
        
            <!-- Sizes your content based upon application components -->
            <v-main>
        
            <!-- Provides the application the proper gutter -->
                <v-container fluid>
                    @include('inc.messages')
                    @yield('content')
                </v-container>
            </v-main>
        </v-app>
    </div>
</body>
</html>
