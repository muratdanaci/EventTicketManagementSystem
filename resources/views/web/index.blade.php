@extends('web.layouts.app')

@section('content')

@include('web.sections.home.slider')
@include('web.sections.home.upcoming-event')
@include('web.sections.home.organizer')
@include('web.sections.home.schedule')

@endsection
@section('jsContent')
    <script src={{ asset('web/assets/js/vendor/modernizr-3.5.0.min.js') }}></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src={{ asset('web/assets/js/vendor/jquery-1.12.4.min.js') }}></script>
    <script src={{ asset('web/assets/js/popper.min.js') }}></script>
    <script src={{ asset('web/assets/js/bootstrap.min.js') }}></script>
    <!-- Jquery Mobile Menu -->
    <script src={{ asset('web/assets/js/jquery.slicknav.min.js') }}></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src={{ asset('web/assets/js/owl.carousel.min.js') }}></script>
    <script src={{ asset('web/assets/js/slick.min.js') }}></script>
    <!-- One Page, Animated-HeadLin -->
    <script src={{ asset('web/assets/js/wow.min.js') }}></script>
    <script src={{ asset('web/assets/js/animated.headline.js') }}></script>
    <script src={{ asset('web/assets/js/jquery.magnific-popup.js') }}></script>

    <!-- Date Picker -->
    <script src={{ asset('web/assets/js/gijgo.min.js') }}></script>
    <!-- Nice-select, sticky -->
    <script src={{ asset('web/assets/js/jquery.nice-select.min.js') }}></script>
    <script src={{ asset('web/assets/js/jquery.sticky.js') }}></script>

    <!-- counter , waypoint -->
    <script src={{ asset('web/assets/js/jquery.counterup.min.js') }}></script>
    <script src={{ asset('web/assets/js/waypoints.min.js') }}></script>
    <script src={{ asset('web/assets/js/jquery.countdown.min.js') }}></script>
    <!-- contact js -->
    <script src={{ asset('web/assets/js/contact.js') }}></script>
    <script src={{ asset('web/assets/js/jquery.form.js') }}></script>
    <script src={{ asset('web/assets/js/jquery.validate.min.js') }}></script>
    <script src={{ asset('web/assets/js/mail-script.js') }}></script>
    <script src={{ asset('web/assets/js/jquery.ajaxchimp.min.js') }}></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src={{ asset('web/assets/js/plugins.js') }}></script>
    <script src={{ asset('web/assets/js/main.js') }}></script>
@endsection
