<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('build/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('build/assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Paper Dashboard 2 by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('build/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link href="{{ asset('build/assets/demo/demo.css') }}" rel="stylesheet" /> --}}

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

</head>

<body class="">
    <div class="wrapper h-100">

        <!-- Cebecera -->
        @include('partials.aside');

        <div class="main-panel">
            <!-- Navbar -->
            @include('partials.navegation')
            <!-- End Navbar -->
            <div class="content vh-100">
                @yield('content')
            </div>
            <footer class="footer footer-black fixed-bottom footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="credits ml-auto">
                            <span class="copyright">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Crategica Global Group S.A.S <i class="fa fa-heart heart"></i> 
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    {{-- <script src="{{ asset('build/assets/js/core/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('build/assets/js/core/popper.min.js') }}"></script> --}}
    <script src="{{ asset('build/assets/js/core/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('build/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script> --}}
    <!--  Google Maps Plugin    -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
    <!-- Chart JS -->
    {{-- <script src="{{ asset('build/assets/js/plugins/chartjs.min.js') }}"></script> --}}
    <!--  Notifications Plugin    -->
    {{-- <script src="{{ asset('build/assets/js/plugins/bootstrap-notify.js') }}"></script> --}}
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    {{-- <script src="{{ asset('build/assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! --> --}}
    {{-- <script src="{{ asset('build/assets/demo/demo.js') }}"></script> --}}


    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>

</body>

</html>
