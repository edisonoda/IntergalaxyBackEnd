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

                            <v-list-item-content  class="py-2 my-2" two-line>
                                <v-list-item-title>{{$product->title}} (x{{$product->pivot->product_quantity}})</v-list-item-title>
                                <v-list-item-subtitle class="brMoney">{{$product->price}}</v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>

                        <v-spacer></v-spacer>

                        <div class="d-flex flex-row">
                            <div class="mr-3 my-auto text-body-1 brMoney">{{ $product->price * $product->pivot->product_quantity}}</div>
                            <form method="POST" action="/{{ Auth::user()->id }}/cart/{{$product->id}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}"/>

                                <v-btn small fab type="submit" class="ml-1" color="error">
                                    <v-icon dark>mdi-trash-can-outline</v-icon>
                                </v-btn>
                                {{ method_field('DELETE') }}
                            </form>
                        </div>
                    </v-toolbar>
                @endforeach
            </v-card-text>

            <v-card-text class="d-flex flex-row text-right pt-0 ">
                <p class="text-left my-auto text-h6 mr-3">Total: </p>
                <p class="my-auto text-h6 brMoney">
                    {{ $total_price }}
                </p>
                
                <v-spacer></v-spacer>

                <form method="POST" action="/{{ Auth::user()->id }}/orders">
                    @csrf
                    <input type="hidden" name="total_price" value="{{$total_price}}"/>
                    <v-btn type="submit" class="ml-1" color="primary">
                        Realizar pedido
                    </v-btn>
                </form>
            </v-card-text>
        @else
            <v-card-text>
                <v-sheet class="mx-auto d-flex align-center justify-center" height=300>
                    Adicione produtos ao carrinho para realizar um pedido.
                </v-sheet>
            </v-card-text>
        @endif
    </v-card>
@endsection