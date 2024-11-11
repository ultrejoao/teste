@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Carrinho de Compras</h2>

    @if(Session::has('status'))
        <div class="alert alert-success">{{ Session::get('status') }}</div>
    @endif

    @if(count($cart) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                    <tr>
                        <td><img src="{{ asset('uploads/products/'.$item['image']) }}" width="50" alt="{{ $item['name'] }}"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>R$ {{ number_format($item['price'], 2, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="10" required>
                                <input type="hidden" name="product_id" value="{{ $id }}">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </form>
                        </td>
                        <td>R$ {{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}</td>
                        <td>
                            @foreach($cart as $productId => $product)
                                <form action="{{ route('cart.remove') }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="product_id" value="{{ $productId }}">
                                    <button type="submit" class="btn btn-danger">Remover</button>
                                </form>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <strong>Total: R$ {{ number_format(array_sum(array_map(function ($item) { return $item['price'] * $item['quantity']; }, $cart)), 2, ',', '.') }}</strong>
            <a href="#" class="btn btn-success">Finalizar Compra</a>
        </div>
    @else
        <p>Carrinho vazio!</p>
    @endif
</div>
@endsection
