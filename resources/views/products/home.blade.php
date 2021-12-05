@extends('layouts.app')

@section('content')

<v-container>
    @if(count($products) > 1)
        <v-row justify="center" dense>
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

                        <v-card-title class="text-h6"
                        style="word-break: break-word">
                            {{$product->title}}
                        </v-card-title>

                        <v-card-subtitle>
                            <div class="brMoney">{{$product->price}}</div>
                        </v-card-subtitle>

                        <v-card-text>
                            <!-- class="text-truncate" -->
                            <div style="word-break: break-word">{{$product->description}}</div>
                        </v-card-text>
                    </v-card>
                </v-col>
            @endforeach
        </v-row>
        <v-row class="mt-5" justify="center">{{$products->links('pagination::bootstrap-4')}}</v-row>
    @else
        <p>Ainda não existem produtos cadastrados.</p>
    @endif
    
</v-container>
@endsection