@extends('layouts.app')

@section('content')
<div>
    @if(count($users) > 0)
        @foreach ($users as $user)
            <v-card
                class="mx-auto"
                tile
            >
                <v-toolbar elevation="1" class="mb-1">
                    <v-btn
                        class="text-decoration-none mx-auto"
                        fab
                        small
                        elevation="1"
                        href="{{ route('orders.index', ['user' => $user->id]) }}">
                            <v-icon>mdi-cart</v-icon>
                    </v-btn>
                    <v-list-item>
                        <v-list-item-content  class="pt-2 mt-2">
                            <v-list-item-title>{{$user->name}}</v-list-item-title>
                            <v-list-item-subtitle>{{$user->email}}</v-list-item-subtitle>
                        </v-list-item-content>
                        <v-list-item-content two-line>
                            <v-list-item-subtitle>Registrado: {{$user->created_at}}</v-list-item-subtitle>
                            <v-list-item-subtitle>Atualizado: {{$user->updated_at}}</v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>

                    <v-spacer></v-spacer>

                    <div class="d-flex flex-row">
                        <v-btn class="mx-1" color="primary" href="/users/{{$user->id}}/edit">Editar</v-btn>
                    </div>

                    <div class="d-flex flex-row">
                        <form method="POST" action="/users/{{$user->id}}">
                            @csrf
                            <cancel-dialog button-text="Deletar"></cancel-dialog>
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                </v-toolbar>
            </v-card>
        @endforeach
        {{$users->links()}}
    @else
        <p>Ainda não existem usuários cadastrados.</p>
    @endif
</div>
@endsection