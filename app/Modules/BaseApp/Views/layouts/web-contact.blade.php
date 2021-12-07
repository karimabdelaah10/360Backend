<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <!-- Page Title -->
    <title>{{appName()}} | @yield('page-title')</title>
    <!--/ Page Title -->

    <meta name="author" content="Pe Themes">
    <meta name="description" content="Interactive Portfolio Showcase Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Archivo:400,600,700&display=swap" rel="stylesheet">

    <link href="/assets/Web/css/plugins.css?version={{rand(1,999)}}" rel="stylesheet">
    <link href="/assets/Web/css/entypo.css?version={{rand(1,999)}}" rel="stylesheet">

    <link href="/assets/Web/css/style.css?version={{rand(1,999)}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="shortcut icon" href="/assets/Web/images/logo_gold.png" />
    <link rel="apple-touch-icon" href="/assets/Web/images/logo_gold.png" />
    <!--/ Favicons -->
</head>

<body>
@include('BaseApp::partials.web-header')
<div id="app">
    <!-- Site Content -->
    <div id="main" class="content">
        <!-- Page Settings -->
        <!-- Page Settings -->
        <div class="page-settings" data-layout="{{@$site_layout ?? 'dark'}}"
             data-header-style="{{@$menu_layout ?? 'light'}}"
             data-menu-layout="{{@$menu_layout ?? 'light'}}"></div>
        <!--/ Page settings -->
        <!--/ Page settings -->
        <div id="page-content" class="page-content">
            @yield('content')
        </div>
        @include('BaseApp::partials.web-footer')
    </div>
    <!--/ Site Content -->
</div>
<script src="/assets/Web/js/jquery.min.js?version={{rand(1,999)}}"></script>
<script src="/assets/Web/js/jquery-ui.js?version={{rand(1,999)}}"></script>
<script src="/assets/Web/js/plugins.js?version={{rand(1,999)}}"></script>
<script src="/assets/Web/js/scripts.js?version={{rand(1,999)}}"></script>
@stack('web_js')
<script>
    document.addEventListener('contextmenu', function (e) {
        e.preventDefault();
    });
    document.onkeydown = function(e) {
        if(event.keyCode == 123) {
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            return false;
        }
        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            return false;
        }
    }
</script>
</body>
</html>
