<v-app-bar dark app>
    <v-btn class="text-decoration-none text-h5 font-weight-black" plain text href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </v-btn>

    <v-btn class="text-decoration-none" text href="{{ url('/') }}">
        Produtos
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
        <v-btn
        class="text-decoration-none"
        text
        href="{{ route('orders.index', [Auth::user()->id]) }}">
            Meus Pedidos
        </v-btn>

        <v-btn
        class="mr-3 text-decoration-none"
        text
        fab
        href="/{{ Auth::user()->id }}/cart">
            <v-icon dark>
                mdi-cart-variant
            </v-icon>
        </v-btn>

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
            <v-list dense>
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