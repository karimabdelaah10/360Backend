<!DOCTYPE html>
<html class="loading" data-textdirection="rtl" lang="ar">
<!-- BEGIN: Head-->
<head>
    @include('BaseApp::partials.meta')
    @include('BaseApp::partials.css')
    @stack('css')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern content-detached-left-sidebar navbar-floating footer-fixed  "
      data-open="click" data-menu="vertical-menu-modern" data-col="content-detached-left-sidebar">
@include('BaseApp::partials.header')
@include('BaseApp::partials.navigation')

<!-- BEGIN: Content-->
<div class="app-content content @yield('contentClasses')">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    <div class="content-wrapper" id="app">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                @include('BaseApp::partials.flash_messages')
                @include('BaseApp::partials.breadcrumb')
            </div>
        </div>
        @yield('content')
    </div>
</div>
<!-- END: Content-->

@include('BaseApp::partials.footer')
@include('BaseApp::partials.js')
@stack('js')
</body>
<!-- END: Body-->
</html>
