<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Turbo Zone</title>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="{{ asset('assets/images/motors.png') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/animation.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('font/fonts.css')}}">
        <link rel="stylesheet" href="{{ asset('icon/style.css')}}">

        <link rel="apple-touch-icon-precomposed" href="{{ asset('images/favicon.ico')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}">

        @stack("styles")
</head>
<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">
                <div class="section-menu-left">
                    <div class="box-logo">
                        <a href="{{ route('home.index')}}" id="site-logo-inner">
                            <img class="" id="logo_header_1" alt="" src="{{ asset('assets/images/motors.png') }}" style="max-width: 50px; display: block; margin: 0 auto;">
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="center">
                        <div class="center-item">
                            <div class="center-heading">Inicio</div>
                            <ul class="menu-list">
                                <li class="menu-item">
                                    <a href="{{ route('admin.index')}}" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Painel</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="center-item">
                            <ul class="menu-list">
                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-shopping-cart"></i></div>
                                        <div class="text">Produtos</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.product.create')}}" class="">
                                                <div class="text">Adicionar Produtos</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.products')}}"class="">
                                                <div class="text">Lista de Produtos</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-layers"></i></div>
                                        <div class="text">Categorias</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.categories.create')}}" class="">
                                                <div class="text">Adicionar Categoria</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.categories.store')}}" class="">
                                                <div class="text">Lista de Categoria</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('user.edit')}}"class="">
                                        <div class="icon"><i class="icon-user"></i></div>
                                        <div class="text">Usuario</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <form method="post" action="{{ route('logout')}}" id="logout-form">
                                        @csrf
                                    <a href="{{ route('logout')}}" class="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <div class="icon"><i class="icon-settings"></i></div>
                                        <div class="text">Sair</div>
                                    </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="section-content-right">
                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">
                                <a href="{{ asset('assets/images/motors.png') }}">
                                    <img class="" id="logo_header_mobile" style="max-width: 50px" alt="" src="{{ asset('assets/images/motors.png') }}"
                                        data-width="154px" data-height="52px" data-retina="{{asset('images/logo/logo.png')}}">
                                </a>
                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-content">
                        @yield('content')
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
    <script src="{{ asset('js/apexcharts/apexcharts.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    <script>
        (function ($) {

            var tfLineChart = (function () {

                var chartBar = function () {

                    var options = {
                        series: [{
                            name: 'Total',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00, 0.00, 0.00, 0.00]
                        }, {
                            name: 'Pending',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00, 0.00, 0.00, 0.00]
                        },
                        {
                            name: 'Delivered',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00]
                        }, {
                            name: 'Canceled',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00]
                        }],
                        chart: {
                            type: 'bar',
                            height: 325,
                            toolbar: {
                                show: false,
                            },
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '10px',
                                endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        legend: {
                            show: false,
                        },
                        colors: ['#2377FC', '#FFA500', '#078407', '#FF0000'],
                        stroke: {
                            show: false,
                        },
                        xaxis: {
                            labels: {
                                style: {
                                    colors: '#212529',
                                },
                            },
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        },
                        yaxis: {
                            show: false,
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return "$ " + val + ""
                                }
                            }
                        }
                    };

                    chart = new ApexCharts(
                        document.querySelector("#line-chart-8"),
                        options
                    );
                    if ($("#line-chart-8").length > 0) {
                        chart.render();
                    }
                };

                /* Function ============ */
                return {
                    init: function () { },

                    load: function () {
                        chartBar();
                    },
                    resize: function () { },
                };
            })();

            jQuery(document).ready(function () { });

            jQuery(window).on("load", function () {
                tfLineChart.load();
            });

            jQuery(window).on("resize", function () { });
        })(jQuery);
    </script>
    @stack("scripts")
</body>
</html>
