<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TEST SITE</title>
    <!-- Latest compiled and minified CSS -->
    @include('partials.admin-css')
    @yield('extra-head-assets')

</head>
<body>
    @yield('header')

    @yield('page-title')

    @yield('content')





<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

@include('partials.admin-js')
@yield('extra-footer-assets')
</body>
</html>