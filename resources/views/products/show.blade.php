@extends('layouts.app')

@section('content')
<v-card
    class="mx-auto"
    dark>
    <v-row no-gutters>
        <v-col>
            <v-img 
            alt="`{{$product->title}}`"
            src="{{$product->image_path}}"
            max-height="500"></v-img>
        </v-col>
        
        <v-col align-self="end">
            <v-card-title
                class="text-h2 text-wrap"
            >{{$product->title}}</v-card-title>

            <v-card-text class="brMoney text-h5">{{$product->price}}</v-card-text>

            <v-card-text class="text-h6">
                {{$product->description}}
            </v-card-text>

            <v-card-text>
                <v-btn
                outlined
                rounded
                >
                Comprar
                </v-btn>
            </v-card-text>
        </v-col>
    </v-row>
</v-card>
@endsection