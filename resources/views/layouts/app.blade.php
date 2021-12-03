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
</head>
<body>
    <div id='app'>
        <v-app>
            <v-navigation-drawer app>
            <!-- -->
            </v-navigation-drawer>
        
            <v-app-bar app>
                <v-btn text href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </v-btn>

                <v-spacer></v-spacer>

                @guest
                    @if (Route::has('login'))
                        <v-btn text href="{{ route('login') }}">
                            {{ __('Login') }}
                        </v-btn>
                    @endif

                    @if (Route::has('register'))
                        <v-btn text href="{{ route('register') }}">
                            {{ __('Register') }}
                        </v-btn>
                    @endif
                @else
                    <v-menu offset-y>
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn
                                color="indigo"
                                outlined
                                dark
                                v-bind="attrs"
                                v-on="on"
                            >
                                {{ Auth::user()->name }}
                            </v-btn>
                        </template>
                        <v-list>
                            <v-list-item>
                                <v-btn
                                    text
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </v-btn>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </v-list-item>
                        </v-list>
                    </v-menu>
                @endguest
            </v-app-bar>
        
            <!-- Sizes your content based upon application components -->
            <v-main>
        
            <!-- Provides the application the proper gutter -->
                <v-container fluid>
                    @yield('content')
                </v-container>
            </v-main>
        </v-app>
    </div>
</body>
</html>
