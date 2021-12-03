@extends('layouts.app')

<script src="{{ asset('js/currencyFormat.js') }}"></script>

@section('content')
<div>
    @if($post->image_path)
        <img src="{{$post->image_path}}" alt="{{$post->title}}">
    @endif

    <h1>{{$post->title}}</h1>
    <small>{{$post->created_at}}</small>
    <script>numberToCurrency($post->price)</script>
</div>
@endsection