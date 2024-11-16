@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Lista de Produtos</h1>

    <div class="container mt-4">
        <form method="GET" action="{{ route('products.index') }}" class="mb-4">
            <div class="input-group">
                <input
                    type="text"
                    name="query"
                    value="{{ request('query') }}"
                    class="form-control"
                    placeholder="Buscar produtos..."
                >
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <div class="row">
            @forelse ($products as $product)
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100">
                        <img
                            src="{{ asset('uploads/products/'.$product->image) }}"
                            class="card-img-top"
                            alt="{{ $product->name }}"
                            style="height: 200px; object-fit: cover;"
                        >
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate">{{ $product->name }}</h5>
                            <div class="mt-auto">
                                <p class="text-primary fw-bold">
                                    R${{ number_format($product->regular_price, 2) }}
                                </p>
                                <a href="{{ route('product.details', $product->id) }}" class="btn btn-sm btn-outline-primary w-100">
                                    Ver Detalhes
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Nenhum produto encontrado.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    {{ $products->links('pagination::bootstrap-4') }}
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
