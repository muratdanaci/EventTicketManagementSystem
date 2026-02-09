<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Event HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

	<!-- CSS here -->
	<link rel="stylesheet" href="{{ asset('web/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('web/assets/css/gijgo.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/fontawesome-all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('web/assets/css/style.css') }}">
    @yield('cssContent')
</head>
<body>

    @include('web.layouts.header')

    <main>
        @yield('content')
    </main>
    @include('web.layouts.footer')
    <!-- JS here -->

    @yield('jsContent')
    </body>
</html>
