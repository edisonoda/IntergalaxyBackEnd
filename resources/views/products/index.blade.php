@extends('layouts.app')

@section('content')
<div>
    @if(count($products) > 0)
        @foreach ($products as $product)
            <v-card
                class="mx-auto"
                tile
            >
                <v-toolbar>
                    <v-list-item>
                        <v-list-item-avatar>
                            <v-img
                                alt="`{{$product->title}}`"
                                src="{{$product->image_path}}"
                            ></v-img>
                        </v-list-item-avatar>

                        <v-list-item-content three-line>
                            <v-list-item-title>{{$product->title}}</v-list-item-title>
                            <v-list-item-subtitle class="brMoney">{{$product->price}}</v-list-item-subtitle>
                            <v-list-item-subtitle>{{$product->created_at}}</v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>

                    <v-spacer></v-spacer>

                    <v-btn color="primary" href="{{ route('products.index') }}">Editar</v-btn>
                </v-toolbar>
            </v-card>
        @endforeach
    @else
        <p>Ainda não existem produtos cadastrados.</p>
    @endif
</div>
@endsection