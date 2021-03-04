<!DOCTYPE html>
<html lang="en">
<head>


    <title>
        LARAVEL SANCTUM
    </title>

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick/slick-theme.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/easy-responsive-tabs.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/mainstyler.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/responsive.css') }}">

    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>

</head>

<body>

    <!--Body-->
    @yield('content')
    <!--Body Ends-->

    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/easyResponsiveTabs.js') }}"></script>
    



</body>
</html>
