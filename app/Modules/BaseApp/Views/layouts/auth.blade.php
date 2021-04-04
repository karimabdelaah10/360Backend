<!DOCTYPE html>
<html class="loading" data-textdirection="rtl" lang="ar">
<!-- BEGIN: Head-->
<head>
    @include('BaseApp::partials.meta')
    @include('BaseApp::partials.css')
    @stack('css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
@include('BaseApp::partials.flash_messages')
@yield('content')

@include('BaseApp::partials.js')
@stack('js')
</body>
<!-- END: Body-->
</html>
