@extends('layouts.app')

@section('content')

<div class="text-h5 mt-3 text-center" style="word-break: break-word">Editar pedido</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{$order->user_id}}/orders/{{$order->id}}">
                        @csrf

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Atualizar
                                </button>
                            </div>
                        </div>
                        {{ method_field('PUT') }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection