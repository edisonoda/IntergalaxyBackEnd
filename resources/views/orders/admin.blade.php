@extends('layouts.app')

@section('content')

<v-container>
    @if(count($orders) > 0)
        <v-expansion-panels dark>
            @foreach ($orders as $order)
                <v-expansion-panel>
                    <v-expansion-panel-header>
                        <div>Ordem nº{{$order->id}}</div>
                        <v-spacer></v-spacer>
                        <div :class="colorStatus('{{$order->status}}')">
                            {{$order->status}}
                        </div>
                    </v-expansion-panel-header>

                    <v-expansion-panel-content>
                        <v-list>
                            @foreach ($order->products as $product)
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
                                        <v-spacer></v-spacer>
                                        <div class="d-flex flex-row">
                                            <div class="mr-3 my-auto text-body-1 brMoney">{{ $product->price * $product->pivot->product_quantity}}</div>
                                        </div>
                                    </v-list-item>
                                </v-toolbar>
                            @endforeach
                        </v-list>

                        <div class="d-flex flex-row">
                            <div><p class="mb-n1 text-subtitle-1">Total: </p>
                                <p class="my-0 text-h6 brMoney">
                                    {{ $order->total_price }}
                                </p>
                            </div>
                            <v-spacer></v-spacer>
                            <cancel-dialog
                            button-text="Cancelar"
                            action="/{{ Auth::user()->id }}/orders/{{$order->id}}"
                            csrf-token="{{ csrf_token() }}"
                            route-param="{{$order->id}}">
                            </cancel-dialog>
                        </div>
                    </v-expansion-panel-content>
                </v-expansion-panel>
            @endforeach
        </v-expansion-panels>
        <v-row class="mt-5" justify="center">{{$orders->links('pagination::bootstrap-4')}}</v-row>
    @else
        <div class="mx-auto d-flex align-center justify-center">
            <p>Você não realizou nenhum pedido.</p>
        </div>
    @endif
</v-container>
@endsection