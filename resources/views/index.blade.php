@extends('layouts.app')
@section('content')
<main>

    <section class="swiper-container js-swiper-slider swiper-number-pagination slideshow" data-settings='{
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": 1,
        "effect": "fade",
        "loop": true
      }'>
      <div class="swiper-wrapper">
        @foreach ($firstCategoryProducts as $product)
            <div class="swiper-slide">
                <div class="overflow-hidden position-relative h-100">
                    <div class="slideshow-character position-absolute bottom-0 pos_right-center">
                        <img loading="lazy"
                             src="{{ asset('uploads/products/' . $product->image) }}"
                             width="542" height="733"
                             alt="{{ $product->name }}"
                             class="slideshow-character__img animate animate_fade animate_btt animate_delay-9 w-auto h-auto" />
                        <div class="character_markup type2">
                        </div>
                    </div>
                    <div class="slideshow-text container position-absolute start-50 top-50 translate-middle">
                        <h2 class="h1 fw-normal mb-0 animate animate_fade animate_btt animate_delay-5">
                            {{ $product->name }}
                        </h2>
                        <h2 class="h1 fw-bold animate animate_fade animate_btt animate_delay-5">
                            R$ {{ number_format($product->regular_price, 2, ',', '.') }}
                        </h2>
                        <a href="{{ route('product.details', $product->id) }}" class="btn-link btn-link_lg default-underline fw-medium animate animate_fade animate_btt animate_delay-7">
                            Compre Agora
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
      <div class="container">
        <div
          class="slideshow-pagination slideshow-number-pagination d-flex align-items-center position-absolute bottom-0 mb-5">
        </div>
      </div>
    </section>

    <div class="container mw-1620 bg-white border-radius-10">
      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
      <section class="hot-deals container">
        <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Promoções</h2>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-20per d-flex align-items-center flex-column justify-content-center py-4 align-items-md-start">
                <h2>Peças Volkswagen</h2>
                <a href="#" class="btn-link default-underline text-uppercase fw-medium mt-3">Ver mais</a>
            </div>

            <div class="col-md-6 col-lg-8 col-xl-80per">
                <div class="position-relative">
                    <div class="swiper-container js-swiper-slider" data-settings='{
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": 4,
                        "slidesPerGroup": 4,
                        "effect": "none",
                        "loop": false,
                        "breakpoints": {
                            "320": {
                                "slidesPerView": 2,
                                "slidesPerGroup": 2,
                                "spaceBetween": 14
                            },
                            "768": {
                                "slidesPerView": 2,
                                "slidesPerGroup": 3,
                                "spaceBetween": 24
                            },
                            "992": {
                                "slidesPerView": 3,
                                "slidesPerGroup": 1,
                                "spaceBetween": 30,
                                "pagination": false
                            },
                            "1200": {
                                "slidesPerView": 4,
                                "slidesPerGroup": 1,
                                "spaceBetween": 30,
                                "pagination": false
                            }
                        }
                    }'>
                        <div class="swiper-wrapper">
                            @foreach($firstCategoryProducts as $product)
                            <div class="swiper-slide product-card product-card_style3">
                                <div class="pc__img-wrapper">
                                    <a href="{{ route('product.details', $product->id) }}">
                                        <img loading="lazy" src="{{ asset('uploads/products/'.$product->image) }}" width="258" height="313" alt="{{ $product->name }}" class="pc__img">
                                        <img loading="lazy" src="{{ asset('uploads/products/'.$product->image) }}" width="258" height="313" alt="{{ $product->name }}" class="pc__img pc__img-second">
                                    </a>
                                </div>
                                <div class="pc__info position-relative">
                                    <h6 class="pc__title"><a href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a></h6>
                                    <div class="product-card__price d-flex">
                                        <span class="money price text-secondary">${{ number_format($product->regular_price, 2) }}</span>
                                    </div>

                                    <!-- Formulário de Adicionar ao Carrinho -->
                                    <div class="anim_appear-bottom position-absolute bottom-0 start-0 d-none d-sm-flex align-items-center bg-body">
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                                            <!-- Botão com o estilo atualizado -->
                                            <button type="submit" class="btn custom-btn-add-to-cart mt-3">
                                                Adicionar ao Carrinho
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
      <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
        <section class="products-grid container">
            <h2 class="section-title text-center mb-3 pb-xl-3 mb-xl-4">Rodas e Pneus</h2>
            <div class="row">
                @foreach ($secondCategoryProducts as $product)
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
            </div>
        </section>


        <div class="text-center mt-2">
          <a class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="#">Ver mais</a>
        </div>
      </section>
    </div>

    <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

  </main>
@endsection
