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

    <link href="/assets/Web/css/plugins.css" rel="stylesheet">
    <link href="/assets/Web/css/entypo.css" rel="stylesheet">

    <link href="/assets/Web/css/style.css" rel="stylesheet">

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
        <div class="page-settings" data-layout="dark" data-header-style="light" data-menu-layout="light"></div>
        <!--/ Page settings -->
        <div id="page-content" class="page-content">
            @yield('content')
        </div>
        @include('BaseApp::partials.web-footer')
    </div>
    <!--/ Site Content -->
</div>
<script src="/assets/Web/js/jquery.min.js"></script>
<script src="/assets/Web/js/jquery-ui.js"></script>
<script src="/assets/Web/js/plugins.js"></script>
<script src="/assets/Web/js/scripts.js"></script>
@stack('web_js')
</body>
</html>
