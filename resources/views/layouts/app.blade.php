<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Turbo Zone</title>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="{{ asset('assets/images/motors.png') }}" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link
          href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
          rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.min.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
          crossorigin="anonymous" referrerpolicy="no-referrer">
        @stack("styles")

    </head>
    <body class="gradient-bg">
        <svg class="d-none">
          <symbol id="icon_nav" viewBox="0 0 25 18">
            <rect width="25" height="2" />
            <rect y="8" width="20" height="2" />
            <rect y="16" width="25" height="2" />
          </symbol>
          <symbol id="icon_user" viewBox="0 0 20 20">
            <g clip-path="url(#clip0_6_29)">
              <path
                d="M10 11.2652C3.99077 11.2652 0.681274 14.108 0.681274 19.2701C0.681274 19.6732 1.00803 20 1.4112 20H18.5888C18.992 20 19.3187 19.6732 19.3187 19.2701C19.3188 14.1083 16.0093 11.2652 10 11.2652ZM2.16768 18.5402C2.45479 14.6805 5.08616 12.7251 10 12.7251C14.9139 12.7251 17.5453 14.6805 17.8326 18.5402H2.16768Z"
                fill="currentColor" />
              <path
                d="M10 0C7.23969 0 5.1582 2.12336 5.1582 4.93895C5.1582 7.83699 7.33023 10.1944 10 10.1944C12.6698 10.1944 14.8419 7.83699 14.8419 4.93918C14.8419 2.12336 12.7604 0 10 0ZM10 8.7348C8.13508 8.7348 6.61805 7.03211 6.61805 4.93918C6.61805 2.92313 8.04043 1.45984 10 1.45984C11.9283 1.45984 13.382 2.95547 13.382 4.93918C13.382 7.03211 11.865 8.7348 10 8.7348Z"
                fill="currentColor" />
            </g>
            <defs>
              <clipPath id="clip0_6_29">
                <rect width="20" height="20" fill="white" />
              </clipPath>
            </defs>
          </symbol>
          <symbol id="icon_cart" viewBox="0 0 20 20">
            <path
              d="M17.6562 4.6875H15.2755C14.9652 2.05164 12.7179 0 10 0C7.28215 0 5.0348 2.05164 4.72445 4.6875H2.34375C1.91227 4.6875 1.5625 5.03727 1.5625 5.46875V19.2188C1.5625 19.6502 1.91227 20 2.34375 20H17.6562C18.0877 20 18.4375 19.6502 18.4375 19.2188V5.46875C18.4375 5.03727 18.0877 4.6875 17.6562 4.6875ZM10 1.5625C11.8548 1.5625 13.3992 2.91621 13.6976 4.6875H6.30238C6.60082 2.91621 8.14516 1.5625 10 1.5625ZM16.875 18.4375H3.125V6.25H4.6875V8.59375C4.6875 9.02523 5.03727 9.375 5.46875 9.375C5.90023 9.375 6.25 9.02523 6.25 8.59375V6.25H13.75V8.59375C13.75 9.02523 14.0998 9.375 14.5312 9.375C14.9627 9.375 15.3125 9.02523 15.3125 8.59375V6.25H16.875V18.4375Z"
              fill="currentColor" />
          </symbol>
        </svg>
        <style>
          #header {
            padding-top: 8px;
            padding-bottom: 8px;
          }

          .logo__image {
            max-width: 220px;
          }
        </style>
        <div class="header-mobile header_sticky" style="background-color: #bd3737">
          <div class="container d-flex align-items-center h-100">
            <a class="mobile-nav-activator d-block position-relative" href="#">
              <svg class="nav-icon"  width="25" height="18" viewBox="0 0 25 18" xmlns="http://www.w3.org/2000/svg">
                <use href="#icon_nav" />
              </svg>
              <button class="btn-close-lg position-absolute top-0 start-0 w-100"></button>
            </a>
            <div class="logo">
              <a href="{{ route('home.index') }}">
                <img src="{{ asset ('assets/images/motors.png')}}" alt="Uomo" class="logo__image d-block" />
              </a>
            </div>
          </div>
          <nav
            class="header-mobile__navigation navigation d-flex flex-column w-100 position-absolute top-100 bg-body overflow-auto"  >
            <div class="container">
              <form action="#" method="GET" class="search-field position-relative mt-4 mb-3">
                <div class="position-relative">
                </div>
              </form>
            </div>
            <div class="container" style="background-color: #bd3737">
              <div class="overflow-hidden">
                <ul class="navigation__list list-unstyled position-relative">
                  <li class="navigation__item">
                    <a href="{{ route('home.index') }}" class="navigation__link">Home</a>
                  </li>
                  <li class="navigation__item">
                    <a href="{{ route('cart.index')}}" class="navigation__link">Carrinho</a>
                  </li>
                  <li class="navigation__item">
                    <a href="{{ route('login') }}" class="navigation__link">Login</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
        <header id="header" class="header header-fullwidth" style="background-color: #bd3737">
          <div class="container">
            <div class="header-desk header-desk_type_1">
              <div class="logo">
                <a href="{{ route('home.index') }}">
                  <img src="{{ asset ('assets/images/motors.png')}}" alt="Uomo" class="logo__image d-block" />
                </a>
              </div>
              <nav class="navigation">
                <ul class="navigation__list list-unstyled d-flex">
                  <li class="navigation__item">
                    <a href="{{ route('home.index') }}" class="navigation__link">Home</a>
                  </li>
                  <li class="navigation__item">
                    <a href="{{ route('cart.index')}}" class="navigation__link">Carrinho</a>
                  </li>
                  <li class="navigation__item">
                    <a href="about.html" class="navigation__link">Contato</a>
                  </li>
                </ul>
              </nav>
              <div class="header-tools d-flex align-items-center">
                @guest
                <div class="header-tools__item hover-container">
                  <a href="{{ route('login') }}" class="header-tools__item">
                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <use href="#icon_user" />
                    </svg>
                  </a>
                </div>
                @else
                    <div class="header-tools__item hover-container">
                        <a href="{{ Auth::user()->utype === 'ADM' ? route('admin.index'): route('user.index') }}" class="header-tools__item">
                            <span class="pr-6px">{{ Auth::user()->name}}</span>
                            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <use href="#icon_user" />
                          </svg>
                        </a>
                    </div>
                @endguest

                <a href="{{ route('cart.index')}}" class="header-tools__item header-tools__cart">
                  <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_cart" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </header>

        @yield("content")
        <hr class="mt-5 text-secondary" />
        <footer class="footer footer_type_2">
          <div class="footer-middle container">
            <div class="row row-cols-lg-5 row-cols-2">
              <div class="footer-column footer-store-info col-12 mb-4 mb-lg-0">
                <div class="logo">
                  <a href="{{ route('home.index') }}">
                    <img src="{{ asset ('assets/images/motors.png')}}" alt="SurfsideMedia" class="logo__image d-block" />
                  </a>
                </div>
                <p class="footer-address">Guarapuava, Paraná, Rua das Videras, 28909887</p>
                <p class="m-0"><strong class="fw-medium">joao@hotmail.com</strong></p>
                <p><strong class="fw-medium">+42 9884488222</strong></p>
                <ul class="social-links list-unstyled d-flex flex-wrap mb-0">
                  <li>
                    <a href="#" class="footer__social-link d-block">
                      <svg class="svg-icon svg-icon_facebook" width="9" height="15" viewBox="0 0 9 15"
                        xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_facebook" />
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="footer__social-link d-block">
                      <svg class="svg-icon svg-icon_twitter" width="14" height="13" viewBox="0 0 14 13"
                        xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_twitter" />
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="footer__social-link d-block">
                      <svg class="svg-icon svg-icon_instagram" width="14" height="13" viewBox="0 0 14 13"
                        xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_instagram" />
                      </svg>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="footer-column footer-menu mb-4 mb-lg-0">
                <h6 class="sub-menu__title text-uppercase">Empresa</h6>
                <ul class="sub-menu__list list-unstyled">
                  <li class="sub-menu__item"><a href="about-2.html" class="menu-link menu-link_us-s">Sobre Nós</a></li>
                  <li class="sub-menu__item"><a href="contact-2.html" class="menu-link menu-link_us-s">Contato</a></li>
                </ul>
              </div>
              <div class="footer-column footer-menu mb-4 mb-lg-0">
                <h6 class="sub-menu__title text-uppercase">Ajuda</h6>
                <ul class="sub-menu__list list-unstyled">
                  <li class="sub-menu__item"><a href="{{ route('login') }}" class="menu-link menu-link_us-s">Minha Conta</a>
                  </li>
                  <li class="sub-menu__item"><a href="store_location.html" class="menu-link menu-link_us-s">Pesquise na Loja</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        <div id="scrollTop" class="visually-hidden end-0"></div>
        <div class="page-overlay"></div>

        <script src="{{ asset('assets/js/plugins/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap-slider.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/swiper.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/countdown.js')}}"></script>
        <script src="{{ asset('assets/js/theme.js')}}"></script>
        @stack("scripts")
      </body>
</html>
