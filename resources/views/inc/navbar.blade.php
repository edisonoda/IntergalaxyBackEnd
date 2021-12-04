<v-app-bar dark app>
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
                    outlined
                    v-bind="attrs"
                    v-on="on"
                >
                    {{ Auth::user()->name }}
                </v-btn>
            </template>
            <v-list>
                <v-list-item>
                    <!--
                    <v-btn
                        href="/profile/{id}"
                        onclick="event.preventDefault();
                        document.getElementById('profile-form').submit();">
                        Perfil
                    </v-btn>
                    <form id="profile-form" action="/profile/{id}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <v-btn
                        href="/profile/{id}/edit"
                        onclick="event.preventDefault();
                        document.getElementById('edit-profile-form').submit();">
                        Editar Dados
                    </v-btn>
                    <form id="edit-profile-form" action="/profile/{id}/edit" method="POST" class="d-none">
                        @csrf
                    </form>
                    -->
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