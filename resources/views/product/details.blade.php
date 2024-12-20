@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-6" style="margin-top: 100px">
            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
        </div>
        <div class="col-md-6" style="margin-top: 100px">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <h3>R${{ number_format($product->regular_price, 2) }}</h3>

            <!-- FORM PARA ADD NO CARRINHO -->
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-primary mt-3" style="background-color:#bd3737">
                    Comprar Agora
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
