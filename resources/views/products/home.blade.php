@extends('layouts.app')

@section('content')
<v-container>
    <v-row justify="center" dense>
        @if(count($products) > 1)
            @foreach ($products as $product)
                <v-col cols="auto">
                    <v-card
                        class="mx-auto"
                        max-width="225"
                        dark
                        href="/products/{{$product->id}}"
                        hover
                        height="400">
                        <v-img
                        alt="`{{$product->title}}`"
                        src="{{$product->image_path}}"
                        max-height="200"
                        ></v-img>

                        <v-card-title class="text-h6">
                            {{$product->title}}
                        </v-card-title>

                        <v-card-subtitle>
                            <div class="brMoney">{{$product->price}}</div>
                        </v-card-subtitle>

                        <v-card-text>
                            <div>{{$product->description}}</div>
                        </v-card-text>
                    </v-card>
                </v-col>
            @endforeach
        @else
            <p>Ainda não existem produtos cadastrados.</p>
        @endif
    </v-row>
</v-container>
@endsection