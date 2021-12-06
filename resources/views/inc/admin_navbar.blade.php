<v-app-bar dark app>
    <v-btn class="text-decoration-none text-h5 font-weight-black" plain text href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </v-btn>

    <v-btn class="text-decoration-none" text href="{{ url('/') }}">
        Produtos
    </v-btn>

    <v-btn
    class="text-decoration-none"
    text
    href="{{ route('orders.index', ['user', Auth::user()->id]) }}">
            Pedidos
    </v-btn>

    <v-btn
    class="text-decoration-none"
    text
    href="{{ route('users') }}">
        Usuários
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
    class="text-decoration-none secondary mr-2"
    rounded
    href="{{ route('products.create') }}">
        <v-icon class="mr-2">mdi-plus</v-icon>
        Novo produto
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
            <v-list>
                <v-list-item>
                    <v-btn
                        text
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