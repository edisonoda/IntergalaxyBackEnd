@extends('layouts.app')

@section('content')
    <v-card
        class="mx-auto"
        dark
        tile
    >
        <v-card-title>
            <div class="text-h3 text-center">Meu carrinho</div>
        </v-card-title>

        @if(count($products) > 0)
            <v-card-text>
                @foreach ($products as $product)
                    <v-toolbar elevation="1" class="mb-1">
                        <v-list-item>
                            <v-list-item-avatar>
                                <v-img
                                    src="{{$product->image_path}}"
                                ></v-img>
                            </v-list-item-avatar>

                            <v-list-item-content  class="py-2 my-2" three-line>
                                <v-list-item-title>{{$product->title}} (x{{$product->pivot->product_quantity}})</v-list-item-title>
                                <v-list-item-subtitle class="brMoney">{{$product->price}}</v-list-item-subtitle>
                                <v-list-item-subtitle>{{$product->created_at}}</v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>

                        <v-spacer></v-spacer>

                        <div class="d-flex flex-row">
                            <form method="POST" action="/{{ Auth::user()->id }}/cart/{{$product->id}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}"/>

                                <v-btn small fab type="submit" class="ml-1" color="error">
                                    <v-icon dark>mdi-minus</v-icon>
                                </v-btn>
                                {{ method_field('DELETE') }}
                            </form>
                        </div>
                    </v-toolbar>
                @endforeach
            </v-card-text>

            <v-card-text class="text-right">
                <form method="POST" action="/{{ Auth::user()->id }}/order">
                    @csrf
                    <input type="hidden" name="products" value="{{$products}}"/>

                    <v-btn small fab type="submit" class="ml-1" color="primary">
                        <v-icon dark>Realizar pedido</v-icon>
                    </v-btn>
                </form>
            </v-card-text>
        @else
            <p>Ainda não existem produtos cadastrados.</p>
        @endif
    </v-card>
@endsection