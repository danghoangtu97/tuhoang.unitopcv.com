<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('title')

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">




    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('partials.admin.header')
        @include('partials.admin.sidabar')

        @yield('content')

        @include('partials.admin.footer')
    </div>
</body>
<!-- jQuery -->
<script src="{{ asset('adminlte/js/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
{{-- <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script> --}}


@yield('js')

</html>
