<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Project </title>

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href=" {{ asset('assets/front/img/fav-icon') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/adminlte.min.css') }}">
     <!-- Sweetalert2 css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap-datepicker/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">

    @yield('styles')

    <style>
        body{
            background-color: rgb(230, 228, 228);
            margin: 70px 0px;
        }

        .active{
            color: black !important;
        }
    </style>

</head>

<body  {{ Session::has('notification') ? 'data-notification' : '' }} @if(Session::has('notification')) data-notification-message='{{ json_encode(Session::get('notification')) }} @endif'>

    @yield('content')

        <!-- JS here -->
        <script src="{{ asset('assets/front/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('assets/admin/plugins/moment/moment.min.js') }}"></script>
        <!-- Sweetalert2 js -->
        <script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>


        <script src="{{ asset('assets/front/js/main.js') }}"></script>

        @yield('scripts')

    </body>
</html>
