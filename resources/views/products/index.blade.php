@extends('layouts.app')

@section('content')
<div>
    @if(count($products) > 1)
        <ul>
        @foreach ($products as $product)
            <li><div class="card-body">{{$product->title}}</div></li>
        @endforeach
        </ul>
    @else
        <p>Ainda não existem produtos cadastrados.</p>
    @endif
</div>
@endsection