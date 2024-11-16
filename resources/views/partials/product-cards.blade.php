@foreach ($products as $product)
<div class="col-6 col-md-4 col-lg-3">
    <div class="product-card product-card_style3 mb-3 mb-md-4 mb-xxl-5">
        <div class="pc__img-wrapper">
            <a href="{{ route('product.details', $product->id) }}">
                <img loading="lazy"
                     src="{{ asset('uploads/products/'.$product->image) }}"
                     width="330" height="400"
                     alt="{{ $product->name }}"
                     class="pc__img">
            </a>
        </div>

        <div class="pc__info position-relative">
            <h6 class="pc__title">
                <a href="{{ route('product.details', $product->id) }}">
                    {{ $product->name }}
                </a>
            </h6>
            <div class="product-card__price d-flex align-items-center">
                <span class="money price text-secondary">
                    ${{ number_format($product->regular_price, 2) }}
                </span>
            </div>

            <!-- Formulário de Adicionar ao Carrinho -->
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn custom-btn-add-to-cart mt-3">
                    Adicionar ao Carrinho
                </button>
            </form>
        </div>
    </div>
</div>
@endforeach
