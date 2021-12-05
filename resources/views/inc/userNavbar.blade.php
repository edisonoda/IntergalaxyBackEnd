<v-app-bar dark app>
    <v-btn text href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </v-btn>

    <v-spacer></v-spacer>

    @guest
        @if (Route::has('login'))
            <v-btn text href="{{ route('login') }}">
                Login
            </v-btn>
        @endif

        @if (Route::has('register'))
            <v-btn text href="{{ route('register') }}">
                Registrar
            </v-btn>
        @endif
    @else
        <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
                <v-btn
                    outlined
                    v-bind="attrs"
                    v-on="on"
                >
                    {{ Auth::user()->name }}
                </v-btn>
            </template>
            <v-list>
                <v-list-item>
                    <v-btn class="mx-auto" text color="primary" href="/profile/{{ Auth::user()->id }}/edit">Editar Dados</v-btn>
                </v-list-item>
                <v-list-item>
                    <v-btn
                        text
                        class="mx-auto"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Sair
                    </v-btn>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </v-list-item>
            </v-list>
        </v-menu>
    @endguest
</v-app-bar>