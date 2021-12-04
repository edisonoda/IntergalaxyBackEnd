@extends('layouts.app')

@section('content')
<div>
    @if(count($orders) > 0)
        @foreach ($orders as $order)
            <v-card
                class="mx-auto"
                tile
            >
                <v-toolbar elevation="1" class="mb-1">
                    <v-list-item>
                        <v-list-item-avatar>
                            <v-img
                                alt="`{{$order->title}}`"
                                src="{{$order->image_path}}"
                            ></v-img>
                        </v-list-item-avatar>

                        <v-list-item-content  class="py-2 my-2" three-line>
                            <v-list-item-title>{{$order->title}}</v-list-item-title>
                            <v-list-item-subtitle class="brMoney">{{$order->price}}</v-list-item-subtitle>
                            <v-list-item-subtitle>{{$order->created_at}}</v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>

                    <v-spacer></v-spacer>

                    <v-btn class="ml-1" color="primary" href="/{{$order->user_id}}/orders/{{$order->id}}/edit">Editar</v-btn>

                    <form method="POST" action="/{{$order->user_id}}/orders/{{$order->id}}">
                        @csrf
                        <v-btn type="submit" class="ml-1" color="error">Deletar</v-btn>
                        {{ method_field('DELETE') }}
                    </form>
                </v-toolbar>
            </v-card>
        @endforeach
    @else
        <p>Ainda não existem produtos cadastrados.</p>
    @endif
</div>
@endsection