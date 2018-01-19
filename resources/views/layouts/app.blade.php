<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Smart Solution LLC</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/lightslider.css') }}">
        <link rel="stylesheet" href="{{ asset('css/lightgallery.css') }}">
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,400i" rel="stylesheet">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    </head>
    <body>
    
        @yield('content')

        @include('partials.footer')
        
        <script src="{{ asset('js/jquery-3.2.1.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery-ui-1.12.1.custom.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/tether.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

        <!-- Plugin for Share buttons -->
        <script src="{{ asset('js/jquery.sharrre.js') }}"></script>

        <!-- Switches -->
        <script src="{{ asset('js/bootstrap-switch.min.js') }}"></script>

        <!--  Plugins for Slider -->
        <script src="{{ asset('js/nouislider.js') }}"></script>

        <!--  Plugins for DateTimePicker -->
        <script src="{{ asset('js/moment.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>

        <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>
        <script src="{{ asset('assets/js/notify.min.js') }}"></script>
        <script src="{{ asset('js/jquery.validate.min.js ') }}"></script>

        <script src="{{ asset('js/app.js?v=2.0.0') }}"></script>
         
        <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('js/countUp.min.js') }}"></script>
        <script src="{{ asset('js/lightslider.min.js') }}"></script>
        <script src="{{ asset('js/lightgallery.min.js') }}"></script>
        <script src="{{ asset('js/lg-zoom.min.js') }}"></script>
        <script src="{{ asset('js/lg-thumbnail.min.js') }}"></script>
        @stack('script')
    </body>
</html>
