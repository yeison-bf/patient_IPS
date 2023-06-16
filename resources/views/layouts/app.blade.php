<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="CryptoDash admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
        content="admin template, CryptoDash Cryptocurrency Dashboard Template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="ThemeSelection">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="apple-touch-icon" href="{{ asset('build/assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('build/assets/images/ico/favicon.ico') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i|Comfortaa:300,400,500,700"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/vendors/css/charts/chartist.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('build/assets/vendors/css/charts/chartist-plugin-tooltip.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('build/assets/css/core/menu/menu-types/vertical-compact-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/vendors/css/cryptocoins/cryptocoins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/pages/timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/pages/dashboard-ico.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css"> -->
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
    data-menu="vertical-compact-menu" data-col="2-columns">

    <!-- fixed-top-->
    <nav
        class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-bg-color">
        <div class="navbar-wrapper">
            <div class="navbar-header d-md-none">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item d-md-none"><a class="navbar-brand" href="index.html"><img
                                class="brand-logo d-none d-md-block" alt="CryptoDash admin logo"
                                src="{{ asset('build/assets/images/logo/logo.png') }}"><img
                                class="brand-logo d-sm-block d-md-none" alt="CryptoDash admin logo sm"
                                src="{{ asset('build/assets/images/logo/logo-sm.png') }}"></a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                            data-target="#navbar-mobile"><i class="la la-ellipsis-v"> </i></a></li>
                </ul>
            </div>
            <div class="navbar-container">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                href="#"><i class="ft-menu"> </i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i
                                    class="ficon ft-search"></i></a>
                            <div class="search-input">
                                <input class="input" type="text" placeholder="Explore CryptoDash...">
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                data-toggle="dropdown">
                                <span class="avatar avatar-online"><img
                                        src="{{ asset('build/assets/images/portrait/small/avatar-s-1.png') }}"
                                        alt="avatar"></span><span class="mr-1"><span
                                        class="user-name text-bold-700">{{ Auth::user()->fullname }}</span></span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item">
                                    <i class="ft-award"></i>{{ Auth::user()->fullname }}
                                </a>
                                <div class="dropdown-divider"></div><a class="dropdown-item"><i class="ft-user"></i>
                                    Profile</a><a class="dropdown-item" href="wallet.html"><i
                                        class="icon-wallet"></i> My Wallet</a><a class="dropdown-item"
                                    href="transactions.html"><i class="ft-check-square"></i> Transactions </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ft-power"></i>
                                    <span class="d-sm-inline d-none">{{ __('Logout') }}</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    @include('../partials.aside')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-transparent">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
                class="float-md-left d-block d-md-inline-block">Copyright &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> <a class="text-bold-800 grey darken-2" href="https://themeselection.com/"
                    target="_blank">ThemeSelection </a>, All rights reserved.
            </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i
                    class="ft-heart pink"></i></span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('build/assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('build/assets/vendors/js/charts/chartist.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/vendors/js/charts/chartist-plugin-tooltip.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('build/assets/vendors/js/timeline/horizontal-timeline.js') }}" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{ asset('build/assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/js/core/app.js') }}" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('build/assets/js/scripts/pages/dashboard-ico.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
</body>

</html>
