@extends('layouts.app')

@section('content')
<v-card
    class="mx-auto"
    max-width="250"
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

    <v-card-text>
        <div class="brMoney">{{$product->price}}</div>
    </v-card-text>

    <v-card-text>
        <div>{{$product->description}}</div>
    </v-card-text>
</v-card>
@endsection